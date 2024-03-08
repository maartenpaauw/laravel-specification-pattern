<?php

declare(strict_types=1);

namespace Workbench\App;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<mixed>
 */
class PositiveSpecification extends CompositeSpecification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return true;
    }
}
