<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 * @implements Specification<TCandidate>
 */
abstract class CompositeSpecification implements Specification
{
    public function not(): CompositeSpecification
    {
        return new NotSpecification($this);
    }
}
