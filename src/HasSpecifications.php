<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

trait HasSpecifications
{
    /**
     * @param Specification<self> $specification
     */
    public function satisfies(Specification $specification): bool
    {
        return $specification->isSatisfiedBy($this);
    }

    /**
     * @param Specification<self> $specification
     */
    public function dissatisfies(Specification $specification): bool
    {
        return (new NotSpecification($specification))->isSatisfiedBy($this);
    }

    /**
     * @deprecated use `satisfies()` instead
     *
     * @param Specification<self> $specification
     */
    public function meets(Specification $specification): bool
    {
        return $this->satisfies($specification);
    }
}
