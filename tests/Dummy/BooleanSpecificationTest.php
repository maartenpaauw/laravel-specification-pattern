<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Dummy;

use Maartenpaauw\Specifications\Tests\TestCase;

class BooleanSpecificationTest extends TestCase
{
    private BooleanSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new BooleanSpecification();
    }

    /** @test */
    public function it_should_return_true_when_the_candidate_is_true(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy(true);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_candidate_is_false(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy(false);

        // Assert
        $this->assertFalse($satisfied);
    }
}
