<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 *
 * @extends CompositeSpecification<TCandidate>
 */
final class VerboseSpecification extends CompositeSpecification
{
    /**
     * @param  Specification<TCandidate>  $origin
     */
    public function __construct(
        private readonly Specification $origin,
        private readonly string $message = '',
    ) {}

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

    public function message(): string
    {
        return $this->message;
    }

    /**
     * @param  TCandidate  $candidate
     *
     * @throws DissatisfiedSpecification
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        if ($this->origin->isSatisfiedBy($candidate)) {
            return true;
        }

        throw new DissatisfiedSpecification($this->message);
    }
}
