<?php

namespace JeffersonGoncalves\Filament\QuebecRequests;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QuebecRequestsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-quebec-requests')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
