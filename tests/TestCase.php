<?php

namespace Maartenpaauw\LaravelSpecificationPattern\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Maartenpaauw\LaravelSpecificationPattern\LaravelSpecificationPatternServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelSpecificationPatternServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }
}
