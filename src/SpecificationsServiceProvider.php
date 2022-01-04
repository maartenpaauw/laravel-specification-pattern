<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Illuminate\Support\Collection;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Maartenpaauw\Specifications\Commands\MakeSpecificationCommand;

class SpecificationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-specification-pattern')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(MakeSpecificationCommand::class);
    }

    public function registeringPackage(): void
    {
        Collection::macro('matching', app(MatchingMacro::class)());
    }
}
