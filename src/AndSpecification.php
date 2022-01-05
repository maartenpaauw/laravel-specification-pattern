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
     * @var array<Specification<TCandidate>>
     */
    private array $specifications;

    /**
     * @param array<Specification<TCandidate>> $specifications
     */
    public function __construct(array $specifications)
    {
        $this->specifications = $specifications;
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
