<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Override;
use Webmozart\Assert\Assert;

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
    ) {
        Assert::allIsInstanceOf($specifications, Specification::class);
    }

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
