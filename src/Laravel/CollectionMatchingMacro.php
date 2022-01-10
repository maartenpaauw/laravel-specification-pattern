<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Laravel;

use Closure;
use Illuminate\Support\Collection;
use Maartenpaauw\Specifications\Specification;

/**
 * @mixin Collection
 */
class CollectionMatchingMacro
{
    public function __invoke(): Closure
    {
        return function (Specification $specification) {
            return $this->filter(static function ($candidate) use ($specification): bool {
                return $specification->isSatisfiedBy($candidate);
            });
        };
    }
}
