<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use PHPUnit\Framework\Attributes\Small;
use Workbench\App\Candidate;
use Workbench\App\NegativeSpecification;
use Workbench\App\PositiveSpecification;

/**
 * @internal
 */
#[Small]
final class HasSpecificationsTest extends TestCase
{
    public function test_it_should_pass_the_candidate_to_the_specification(): void
    {
        // Arrange
        $candidate = new Candidate();

        // Act + Assert
        $this->assertTrue($candidate->satisfies(new PositiveSpecification()));
        $this->assertFalse($candidate->satisfies(new NegativeSpecification()));

        $this->assertFalse($candidate->dissatisfies(new PositiveSpecification()));
        $this->assertTrue($candidate->dissatisfies(new NegativeSpecification()));
    }
}
