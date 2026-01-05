<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use InvalidArgumentException;
use Maartenpaauw\Specifications\XorSpecification;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;
use Workbench\App\LengthSpecification;
use Workbench\App\UppercaseSpecification;

/**
 * @internal
 */
#[Small]
final class XorSpecificationTest extends TestCase
{
    /**
     * @var XorSpecification<string>
     */
    private XorSpecification $specification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->specification = new XorSpecification([
            new UppercaseSpecification(),
            new LengthSpecification(12),
        ]);
    }

    public function test_it_should_throw_an_invalid_argument_exception_when_the_specification_array_does_contain_invalid_data(): void
    {
        self::expectException(InvalidArgumentException::class);

        // @phpstan-ignore-next-line
        new XorSpecification(['invalid']);
    }

    public function test_it_should_only_return_true_when_one_specification_is_satisfied(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy('HELLO'));
        $this->assertTrue($this->specification->isSatisfiedBy('hello world!'));
        $this->assertFalse($this->specification->isSatisfiedBy('HELLO WORLD!'));
    }
}
