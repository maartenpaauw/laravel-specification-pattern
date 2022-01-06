<?php

declare(strict_types=1);

namespace App\Specifications;

use Maartenpaauw\Specifications\Specification;

/**
 * @implements Specification<string>
 */
class MyStrictBasicSpecification implements Specification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return true;
    }
}
