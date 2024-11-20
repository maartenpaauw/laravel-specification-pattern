<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 *
 * @implements Specification<TCandidate>
 */
abstract class CompositeSpecification implements Specification
{
    /**
     * @return CompositeSpecification<TCandidate>
     */
    final public function not(): self
    {
        return new NotSpecification($this);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     *
     * @return CompositeSpecification<TCandidate>
     */
    final public function or(Specification $specification): self
    {
        return new OrSpecification([$this, $specification]);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     *
     * @return CompositeSpecification<TCandidate>
     */
    final public function orNot(Specification $specification): self
    {
        return $this->or(new NotSpecification($specification));
    }

    /**
     * @param  Specification<TCandidate>  $specification
     *
     * @return CompositeSpecification<TCandidate>
     */
    final public function xor(Specification $specification): self
    {
        return new XorSpecification([$this, $specification]);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     *
     * @return CompositeSpecification<TCandidate>
     */
    final public function xorNot(Specification $specification): self
    {
        return $this->xor(new NotSpecification($specification));
    }

    /**
     * @param  Specification<TCandidate>  $specification
     *
     * @return CompositeSpecification<TCandidate>
     */
    final public function and(Specification $specification): self
    {
        return new AndSpecification([$this, $specification]);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     *
     * @return CompositeSpecification<TCandidate>
     */
    final public function andNot(Specification $specification): self
    {
        return $this->and(new NotSpecification($specification));
    }

    /**
     * @return CompositeSpecification<TCandidate>
     */
    final public function verbose(string $message = '', int $code = 0): self
    {
        return new VerboseSpecification($this, $message, $code);
    }
}
