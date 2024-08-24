<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Workbench\App\Candidate;
use Workbench\App\NegativeSpecification;
use Workbench\App\PositiveSpecification;

/**
 * @internal
 *
 * @small
 */
final class HasSpecificationsTest extends TestCase
{
    public function test_it_should_pass_the_candidate_to_the_specification(): void
    {
        // Arrange
        $candidate = new Candidate();

        // Act + Assert
        $this->assertTrue($candidate->satisfies(new PositiveSpecification()));
        $this->assertFalse($candidate->satisfies(new NegativeSpecification()));
    }
}
