<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Dummy;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<mixed>
 */
class NegativeSpecification extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return false;
    }
}
