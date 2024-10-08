<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications;

use Illuminate\Support\Collection;
use Maartenpaauw\Specifications\Commands\MakeSpecificationCommand;
use Maartenpaauw\Specifications\Laravel\CollectionMatchingMacro;
use Override;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class SpecificationsServiceProvider extends PackageServiceProvider
{
    #[Override]
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-specification-pattern')
            ->hasConfigFile()
            ->hasCommand(MakeSpecificationCommand::class);
    }

    #[Override]
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
