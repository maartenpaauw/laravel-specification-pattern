<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 * @extends CompositeSpecification<TCandidate>
 */
class NotSpecification extends CompositeSpecification
{
    /**
     * @param Specification<TCandidate> $specification
     */
    public function __construct(private Specification $specification)
    {
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return ! $this->specification->isSatisfiedBy($candidate);
    }
}
