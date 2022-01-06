<?php

declare(strict_types=1);

namespace App\Specifications;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<mixed>
 */
class MyCompositeSpecification extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return true;
    }
}
