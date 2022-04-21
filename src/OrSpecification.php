<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 *
 * @extends CompositeSpecification<TCandidate>
 */
final class OrSpecification extends CompositeSpecification
{
    /**
     * @param array<Specification<TCandidate>> $specifications
     */
    public function __construct(
        private array $specifications,
    ) {
    }

    public function isSatisfiedBy(mixed $candidate): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($candidate)) {
                return true;
            }
        }

        return false;
    }
}
