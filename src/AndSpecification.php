<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Override;

/**
 * @template TCandidate
 *
 * @extends CompositeSpecification<TCandidate>
 */
final class AndSpecification extends CompositeSpecification
{
    /**
     * @param  array<array-key, Specification<TCandidate>>  $specifications
     */
    public function __construct(
        private readonly array $specifications,
    ) {}

    #[Override]
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
