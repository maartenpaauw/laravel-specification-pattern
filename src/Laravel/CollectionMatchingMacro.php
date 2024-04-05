<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Laravel;

use Closure;
use Illuminate\Support\Collection;
use Maartenpaauw\Specifications\Specification;

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @mixin Collection<TKey, TValue>
 */
final class CollectionMatchingMacro
{
    public function __invoke(): Closure
    {
        return fn (Specification $specification) => $this->filter(
            static fn (mixed $candidate): bool => $specification->isSatisfiedBy($candidate),
        );
    }
}
