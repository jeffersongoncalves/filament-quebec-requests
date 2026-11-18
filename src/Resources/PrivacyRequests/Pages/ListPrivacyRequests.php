<?php

namespace JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\PrivacyRequestResource;

class ListPrivacyRequests extends ListRecords
{
    protected static string $resource = PrivacyRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
