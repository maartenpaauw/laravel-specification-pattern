<?php

declare(strict_types=1);

namespace Workbench\App;

use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<string>
 */
final class LengthSpecification extends CompositeSpecification
{
    public function __construct(
        private readonly int $length,
    ) {}

    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return \mb_strlen($candidate) === $this->length;
    }
}
