<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Override;

/**
 * @template TCandidate
 *
 * @extends CompositeSpecification<TCandidate>
 */
final class NotSpecification extends CompositeSpecification
{
    /**
     * @param  Specification<TCandidate>  $specification
     */
    public function __construct(
        private readonly Specification $specification,
    ) {}

    #[Override]
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return ! $this->specification->isSatisfiedBy($candidate);
    }
}
