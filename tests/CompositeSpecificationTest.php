<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\VerboseSpecification;
use Workbench\App\NegativeSpecification;
use Workbench\App\PositiveSpecification;

/**
 * @internal
 *
 * @small
 */
final class CompositeSpecificationTest extends TestCase
{
    private PositiveSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new PositiveSpecification();
    }

    public function test_it_should_return_false_when_inverting_the_specification(): void
    {
        // Act
        $satisfied = $this->specification
            ->not()
            ->isSatisfiedBy(null);

        // Assert
        $this->assertFalse($satisfied);
    }

    public function test_it_should_return_true_when_chaining_the_specification_twice(): void
    {
        // Act
        $satisfied = $this->specification
            ->not()
            ->not()
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_return_true_when_chaining_a_satisfied_and_a_dissatisfied_or_specification(): void
    {
        // Act
        $satisfied = $this->specification
            ->or(new NegativeSpecification())
            ->or(new PositiveSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_return_true_when_combining_an_inverting_not_method_with_a_satisfied_or_specification(): void
    {
        // Act
        $satisfied = $this->specification
            ->not()
            ->or(new PositiveSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_be_possible_to_chain_the_or_not_specification(): void
    {
        // Act
        $satisfied = (new NegativeSpecification())
            ->orNot(new NegativeSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_be_possible_to_chain_the_xor_specification(): void
    {
        // Act
        $satisfied = $this->specification
            ->xor(new NegativeSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_be_possible_to_chain_the_xor_not_specification(): void
    {
        // Act
        $satisfied = $this->specification
            ->xorNot(new NegativeSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertFalse($satisfied);
    }

    public function test_it_should_return_true_when_chaining_multiple_satisfied_and_specifications(): void
    {
        // Act
        $satisfied = $this->specification
            ->and(new PositiveSpecification())
            ->and(new PositiveSpecification())
            ->and(new PositiveSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_be_possible_to_chain_the_and_not_specification(): void
    {
        // Act
        $satisfied = $this->specification
            ->andNot(new NegativeSpecification())
            ->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_make_the_specification_verbose(): void
    {
        // Act
        $specification = $this->specification
            ->verbose('The specification is not satisfied', 10);

        // Assert
        $this->assertInstanceOf(VerboseSpecification::class, $specification);
        $this->assertSame('The specification is not satisfied', $specification->message());
        $this->assertSame(10, $specification->code());
    }
}
