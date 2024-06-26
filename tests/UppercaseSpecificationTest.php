<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Workbench\App\UppercaseSpecification;

/**
 * @internal
 *
 * @small
 */
final class UppercaseSpecificationTest extends TestCase
{
    private UppercaseSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new UppercaseSpecification();
    }

    public function test_it_should_return_true_when_the_given_string_is_uppercase(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('HELLO WORLD!');

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_return_false_when_the_given_string_is_lowercase(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('hello world!');

        // Assert
        $this->assertFalse($satisfied);
    }
}
