<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\AndSpecification;
use Maartenpaauw\Specifications\Tests\Dummy\LengthSpecification;
use Maartenpaauw\Specifications\Tests\Dummy\UppercaseSpecification;

class AndSpecificationTest extends TestCase
{
    /**
     * @var AndSpecification<string>
     */
    private AndSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new AndSpecification([
            new UppercaseSpecification(),
            new LengthSpecification(12),
        ]);
    }

    /** @test */
    public function is_should_return_true_when_the_given_string_matches_all_specifications(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('HELLO WORLD!');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function is_should_return_false_when_the_given_string_does_not_match_all_specifications(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('hello world!');

        // Assert
        $this->assertFalse($satisfied);
    }
}
