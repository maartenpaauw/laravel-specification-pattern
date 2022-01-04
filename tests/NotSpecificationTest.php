<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\NotSpecification;
use Maartenpaauw\Specifications\Tests\Dummy\UppercaseSpecification;

class NotSpecificationTest extends TestCase
{
    /** @var NotSpecification<string> */
    private NotSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new NotSpecification(new UppercaseSpecification());
    }

    /** @test */
    public function is_should_return_false_when_the_given_specification_is_satisfied(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('HELLO WORLD!');

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function is_should_return_true_when_the_given_specification_is_dissatisfied(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('hello world!');

        // Assert
        $this->assertTrue($satisfied);
    }
}
