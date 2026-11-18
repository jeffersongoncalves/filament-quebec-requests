<?php

namespace JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\Pages;

use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\QuebecRequests\Actions\RequestActions;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\PrivacyRequestResource;

class ViewPrivacyRequest extends ViewRecord
{
    protected static string $resource = PrivacyRequestResource::class;

    protected function getHeaderActions(): array
    {
        return RequestActions::all();
    }
}
