<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\DissatisfiedSpecification;
use Maartenpaauw\Specifications\VerboseSpecification;
use PHPUnit\Framework\Attributes\Small;
use Workbench\App\LengthSpecification;

/**
 * @internal
 */
#[Small]
final class VerboseSpecificationTest extends TestCase
{
    /**
     * @var VerboseSpecification<string>
     */
    private VerboseSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new VerboseSpecification(
            new LengthSpecification(12),
        );
    }

    public function test_it_should_throw_an_exception_with_an_empty_message_when_the_specification_is_not_satisfied(): void
    {
        // Assert
        $this->expectException(DissatisfiedSpecification::class);
        $this->expectExceptionMessage('');
        $this->expectExceptionCode(0);

        // Act
        $this->specification->isSatisfiedBy('Hello Laravel!');
    }

    public function test_it_should_be_possible_to_customize_the_exception_message(): void
    {
        // Assert
        $this->expectException(DissatisfiedSpecification::class);
        $this->expectExceptionMessage('The given string is longer than 12 characters!');

        // Act
        $this->specification
            ->withMessage('The given string is longer than 12 characters!')
            ->isSatisfiedBy('Hello Laravel!');
    }

    public function test_it_should_be_possible_to_customize_the_exception_code(): void
    {
        // Assert
        $this->expectException(DissatisfiedSpecification::class);
        $this->expectExceptionCode(10);

        // Act
        $this->specification
            ->withCode(10)
            ->isSatisfiedBy('Hello Laravel!');
    }

    public function test_it_should_return_true_when_the_specification_is_satisfied_with_the_given_candidate(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('Hello world!');

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_be_possible_to_receive_the_message(): void
    {
        // Arrange
        $specification = $this->specification->withMessage('This is the reason why it is dissatisfied.');

        // Act
        $message = $specification->message();

        // Assert
        $this->assertSame('This is the reason why it is dissatisfied.', $message);
    }

    public function test_it_should_be_possible_to_receive_the_code(): void
    {
        // Arrange
        $specification = $this->specification->withCode(10);

        // Act
        $code = $specification->code();

        // Assert
        $this->assertSame(10, $code);
    }
}
