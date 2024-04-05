<?php

declare(strict_types=1);

namespace Workbench\App;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<string>
 */
final class UppercaseSpecification extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return mb_strtoupper($candidate) === $candidate;
    }
}
