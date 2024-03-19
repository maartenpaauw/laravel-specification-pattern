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
    public function not(): CompositeSpecification
    {
        return new NotSpecification($this);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     * @return CompositeSpecification<TCandidate>
     */
    public function or(Specification $specification): CompositeSpecification
    {
        return new OrSpecification([$this, $specification]);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     * @return CompositeSpecification<TCandidate>
     */
    public function orNot(Specification $specification): CompositeSpecification
    {
        return $this->or(new NotSpecification($specification));
    }

    /**
     * @param  Specification<TCandidate>  $specification
     * @return CompositeSpecification<TCandidate>
     */
    public function xor(Specification $specification): CompositeSpecification
    {
        return new XorSpecification([$this, $specification]);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     * @return CompositeSpecification<TCandidate>
     */
    public function xorNot(Specification $specification): CompositeSpecification
    {
        return $this->xor(new NotSpecification($specification));
    }

    /**
     * @param  Specification<TCandidate>  $specification
     * @return CompositeSpecification<TCandidate>
     */
    public function and(Specification $specification): CompositeSpecification
    {
        return new AndSpecification([$this, $specification]);
    }

    /**
     * @param  Specification<TCandidate>  $specification
     * @return CompositeSpecification<TCandidate>
     */
    public function andNot(Specification $specification): CompositeSpecification
    {
        return $this->and(new NotSpecification($specification));
    }

    /**
     * @return CompositeSpecification<TCandidate>
     */
    public function verbose(string $message = ''): CompositeSpecification
    {
        return new VerboseSpecification($this, $message);
    }
}
