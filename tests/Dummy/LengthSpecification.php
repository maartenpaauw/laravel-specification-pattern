<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Dummy;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<string>
 */
class LengthSpecification extends CompositeSpecification
{
    public function __construct(
        private readonly int $length,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return strlen($candidate) === $this->length;
    }
}
