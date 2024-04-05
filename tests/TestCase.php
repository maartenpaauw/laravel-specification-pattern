<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\SpecificationsServiceProvider;
use Orchestra\Testbench\Attributes\WithConfig;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * @internal
 *
 * @small
 */
#[WithConfig('database.default', 'testing')]
abstract class TestCase extends Orchestra
{
    protected function getPackageProviders(mixed $app): array
    {
        return [
            SpecificationsServiceProvider::class,
        ];
    }
}
