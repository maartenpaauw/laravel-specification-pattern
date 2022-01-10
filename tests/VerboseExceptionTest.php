<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\SpecificationException;
use Maartenpaauw\Specifications\Tests\Dummy\LengthSpecification;
use Maartenpaauw\Specifications\VerboseSpecification;

class VerboseExceptionTest extends TestCase
{
    /** @var VerboseSpecification<string> */
    private VerboseSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new VerboseSpecification(
            new LengthSpecification(12),
        );
    }

    /** @test */
    public function it_should_throw_an_exception_with_an_empty_message_when_the_specification_is_not_satisfied(): void
    {
        // Assert
        $this->expectException(SpecificationException::class);
        $this->expectExceptionMessage('');

        // Act
        $this->specification->isSatisfiedBy('Hello Laravel!');
    }

    /** @test */
    public function it_should_be_possible_to_customize_the_exception_message(): void
    {
        // Assert
        $this->expectException(SpecificationException::class);
        $this->expectExceptionMessage('The given string is longer than 12 characters!');

        // Act
        $this->specification
            ->withMessage('The given string is longer than 12 characters!')
            ->isSatisfiedBy('Hello Laravel!');
    }

    /** @test */
    public function it_should_return_true_when_the_specification_is_satisfied_with_the_given_candidate(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('Hello world!');

        // Assert
        $this->assertTrue($satisfied);
    }
}
