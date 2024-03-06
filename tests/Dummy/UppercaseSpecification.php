<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Dummy;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<string>
 */
class UppercaseSpecification extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return strtoupper($candidate) === $candidate;
    }
}
