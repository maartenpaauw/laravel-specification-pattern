<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\Tests\Dummy\BooleanSpecification;

class CompositeSpecificationTest extends TestCase
{
    private BooleanSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new BooleanSpecification();
    }

    /** @test */
    public function it_should_return_false_when_inverting_the_specification_ones(): void
    {
        // Act
        $satisfied = $this->specification->not()->isSatisfiedBy(true);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_inverting_the_specification_twice(): void
    {
        // Act
        $satisfied = $this->specification->not()->not()->isSatisfiedBy(true);

        // Assert
        $this->assertFalse($satisfied);
    }
}
