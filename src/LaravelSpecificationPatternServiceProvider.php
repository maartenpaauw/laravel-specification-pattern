<?php

namespace Maartenpaauw\LaravelSpecificationPattern;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Maartenpaauw\LaravelSpecificationPattern\Commands\LaravelSpecificationPatternCommand;

class LaravelSpecificationPatternServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-specification-pattern')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(LaravelSpecificationPatternCommand::class);
    }
}
