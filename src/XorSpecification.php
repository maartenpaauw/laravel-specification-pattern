<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 *
 * @extends CompositeSpecification<TCandidate>
 */
final class XorSpecification extends CompositeSpecification
{
    /**
     * @param  array<array-key, Specification<TCandidate>>  $specifications
     */
    public function __construct(
        private readonly array $specifications,
    ) {}

    public function isSatisfiedBy(mixed $candidate): bool
    {
        $satisfiedSpecifications = array_filter(
            $this->specifications,
            static fn (Specification $specification): bool => $specification->isSatisfiedBy($candidate),
        );

        return \count($satisfiedSpecifications) === 1;
    }
}
