<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Illuminate\Support\Collection;
use Maartenpaauw\Specifications\Commands\MakeSpecificationCommand;
use Maartenpaauw\Specifications\Laravel\CollectionMatchingMacro;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SpecificationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-specification-pattern')
            ->hasConfigFile()
            ->hasCommand(MakeSpecificationCommand::class);
    }

    public function packageRegistered(): void
    {
        /** @var string $method */
        $method = config('specification-pattern.collection-method', 'matching');

        Collection::macro(
            $method,
            app(CollectionMatchingMacro::class)(),
        );
    }
}
