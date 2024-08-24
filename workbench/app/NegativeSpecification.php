<?php

declare(strict_types=1);

namespace Workbench\App;

use Maartenpaauw\Specifications\CompositeSpecification;
use Override;

/**
 * @extends CompositeSpecification<mixed>
 */
final class NegativeSpecification extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    #[Override]
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return false;
    }
}
