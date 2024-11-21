<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Laravel;

use Illuminate\Auth\Access\Response;
use Maartenpaauw\Specifications\DissatisfiedSpecification;
use Maartenpaauw\Specifications\Specification;

/**
 * @template TCandidate
 */
final class AccessResponseTransformer
{
    /**
     * @param Specification<TCandidate> $specification
     * @param TCandidate $candidate
     */
    public function transform(Specification $specification, mixed $candidate): Response
    {
        try {
            $satisfied = $specification->isSatisfiedBy($candidate);
        } catch (DissatisfiedSpecification $e) {
            return Response::deny($e->getMessage(), $e->getCode());
        }

        return $satisfied ? Response::allow() : Response::deny();
    }
}
