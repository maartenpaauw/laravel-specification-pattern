<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Override;

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
        private readonly int $code = 0,
    ) {}

    /**
     * @return VerboseSpecification<TCandidate>
     */
    public function withMessage(string $message): self
    {
        return new self(
            $this->origin,
            $message,
            $this->code,
        );
    }

    /**
     * @return VerboseSpecification<TCandidate>
     */
    public function withCode(int $code): self
    {
        return new self(
            $this->origin,
            $this->message,
            $code,
        );
    }

    public function message(): string
    {
        return $this->message;
    }

    public function code(): int
    {
        return $this->code;
    }

    /**
     * @param  TCandidate  $candidate
     *
     * @throws DissatisfiedSpecification
     */
    #[Override]
    public function isSatisfiedBy(mixed $candidate): bool
    {
        if ($this->origin->isSatisfiedBy($candidate)) {
            return true;
        }

        throw new DissatisfiedSpecification($this->message, $this->code);
    }
}
