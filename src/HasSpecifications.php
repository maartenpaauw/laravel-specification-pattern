<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

trait HasSpecifications
{
    /**
     * @param Specification<self> $specification
     */
    public function meets(Specification $specification): bool
    {
        return $specification->isSatisfiedBy($this);
    }
}
