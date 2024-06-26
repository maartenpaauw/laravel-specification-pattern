<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Workbench\App\NegativeSpecification;

/**
 * @internal
 *
 * @small
 */
final class NegativeSpecificationTest extends TestCase
{
    private NegativeSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new NegativeSpecification();
    }

    public function test_it_should_return_false_for_all_candidates(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy(null);

        // Assert
        $this->assertFalse($satisfied);
    }
}
