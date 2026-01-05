<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use PHPUnit\Framework\Attributes\Small;
use Workbench\App\PositiveSpecification;

/**
 * @internal
 */
#[Small]
final class PositiveSpecificationTest extends TestCase
{
    private PositiveSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new PositiveSpecification();
    }

    public function test_it_should_return_true_for_all_candidates(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy(null);

        // Assert
        $this->assertTrue($satisfied);
    }
}
