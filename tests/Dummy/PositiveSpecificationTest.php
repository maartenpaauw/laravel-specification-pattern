<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Dummy;

use Maartenpaauw\Specifications\Tests\TestCase;

class PositiveSpecificationTest extends TestCase
{
    private PositiveSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new PositiveSpecification();
    }

    /** @test */
    public function it_should_return_true_for_all_candidates(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }
}
