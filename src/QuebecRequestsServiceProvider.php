<?php

namespace JeffersonGoncalves\Filament\QuebecRequests;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class QuebecRequestsServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-quebec-requests';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations();
    }
}
