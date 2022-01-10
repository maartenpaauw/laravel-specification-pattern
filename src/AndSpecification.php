<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 * @extends CompositeSpecification<TCandidate>
 */
class AndSpecification extends CompositeSpecification
{
    /**
     * @param array<Specification<TCandidate>> $specifications
     */
    public function __construct(private array $specifications)
    {
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        foreach ($this->specifications as $specification) {
            if (! $specification->isSatisfiedBy($candidate)) {
                return false;
            }
        }

        return true;
    }
}
