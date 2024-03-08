<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

/**
 * @template TCandidate
 */
interface Specification
{
    /**
     * @param  TCandidate  $candidate
     */
    public function isSatisfiedBy(mixed $candidate): bool;
}
