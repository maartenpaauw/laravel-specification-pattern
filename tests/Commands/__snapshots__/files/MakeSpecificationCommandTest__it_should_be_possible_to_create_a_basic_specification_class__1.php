<?php

declare(strict_types=1);

namespace App\Specifications;

use Maartenpaauw\Specifications\Specification;

/**
 * @implements Specification<mixed>
 */
class MyBasicSpecification implements Specification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return true;
    }
}
