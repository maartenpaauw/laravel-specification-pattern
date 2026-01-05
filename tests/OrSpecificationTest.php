<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use InvalidArgumentException;
use Maartenpaauw\Specifications\OrSpecification;
use PHPUnit\Framework\Attributes\Small;
use Workbench\App\LengthSpecification;
use Workbench\App\UppercaseSpecification;

/**
 * @internal
 */
#[Small]
final class OrSpecificationTest extends TestCase
{
    /**
     * @var OrSpecification<string>
     */
    private OrSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new OrSpecification([
            new UppercaseSpecification(),
            new LengthSpecification(12),
        ]);
    }

    public function test_it_should_throw_an_invalid_argument_exception_when_the_specification_array_does_contain_invalid_data(): void
    {
        self::expectException(InvalidArgumentException::class);

        // @phpstan-ignore-next-line
        new OrSpecification(['invalid']);
    }

    public function test_it_should_return_true_when_the_candidate_matches_all_specifications(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('HELLO WORLD!');

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_return_true_when_the_candidate_matches_one_of_the_specifications(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('hello world!');

        // Assert
        $this->assertTrue($satisfied);
    }

    public function test_it_should_return_false_when_the_candidate_does_not_match_any_specification(): void
    {
        // Act
        $satisfied = $this->specification->isSatisfiedBy('hello world');

        // Assert
        $this->assertFalse($satisfied);
    }
}
