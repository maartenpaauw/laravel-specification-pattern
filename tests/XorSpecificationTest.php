<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\XorSpecification;
use PHPUnit\Framework\TestCase;
use Workbench\App\LengthSpecification;
use Workbench\App\UppercaseSpecification;

/**
 * @internal
 *
 * @small
 */
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

    public function test_it_should_only_return_true_when_one_specification_is_satisfied(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy('HELLO'));
        $this->assertTrue($this->specification->isSatisfiedBy('hello world!'));
        $this->assertFalse($this->specification->isSatisfiedBy('HELLO WORLD!'));
    }
}
