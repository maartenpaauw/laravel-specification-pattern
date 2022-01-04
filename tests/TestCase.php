<?php

namespace Maartenpaauw\Specifications\Tests;

use Illuminate\Config\Repository;
use Orchestra\Testbench\TestCase as Orchestra;
use Maartenpaauw\Specifications\SpecificationsServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            SpecificationsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        /** @var Repository $config */
        $config = config();

        $config->set('database.default', 'testing');
    }
}
