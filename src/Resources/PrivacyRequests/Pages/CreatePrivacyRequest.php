<?php

namespace JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\PrivacyRequestResource;
use JeffersonGoncalves\QuebecRequests\Enums\RequestType;
use JeffersonGoncalves\QuebecRequests\RequestManager;

class CreatePrivacyRequest extends CreateRecord
{
    protected static string $resource = PrivacyRequestResource::class;

    /**
     * Open through the manager: it sets the status, the legal deadline and fires PrivacyRequestOpened.
     *
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordCreation(array $data): Model
    {
        return app(RequestManager::class)->open(RequestType::from($data['type']), null, [
            'name' => $data['requester_name'] ?? null,
            'email' => $data['requester_email'] ?? null,
            'details' => $data['details'] ?? null,
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
