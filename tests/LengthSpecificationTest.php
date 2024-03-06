<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Workbench\App\LengthSpecification;

class LengthSpecificationTest extends TestCase
{
    private LengthSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new LengthSpecification(12);
    }

    /** @test */
    public function it_should_return_true_when_the_given_string_length_is_equals(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('Hello world!');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_string_does_not_match_the_given_length(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('Hello Laravel!');

        // Assert
        $this->assertFalse($satisfied);
    }
}
