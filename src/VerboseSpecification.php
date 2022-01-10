<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 * @extends CompositeSpecification<TCandidate>
 */
class VerboseSpecification extends CompositeSpecification
{
    /**
     * @param Specification<TCandidate> $origin
     */
    public function __construct(
        private Specification $origin,
        private string $message = '',
    ) {
    }

    /**
     * @return VerboseSpecification<TCandidate>
     */
    public function withMessage(string $message): self
    {
        return new self(
            $this->origin,
            $message,
        );
    }

    /**
     * @param TCandidate $candidate
     *
     * @throws SpecificationException
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        if ($this->origin->isSatisfiedBy($candidate)) {
            return true;
        }

        throw new SpecificationException($this->message);
    }
}
