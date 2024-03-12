<?php

namespace Maartenpaauw\Specifications\Tests;

use Maartenpaauw\Specifications\SpecificationsServiceProvider;
use Orchestra\Testbench\Attributes\WithConfig;
use Orchestra\Testbench\TestCase as Orchestra;

#[WithConfig('database.default', 'testing')]
class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            SpecificationsServiceProvider::class,
        ];
    }
}
