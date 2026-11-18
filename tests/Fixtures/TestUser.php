<?php

namespace JeffersonGoncalves\Filament\QuebecRequests\Tests\Fixtures;

use Illuminate\Foundation\Auth\User as Authenticatable;
use JeffersonGoncalves\Quebec\Attributes\PersonalData;
use JeffersonGoncalves\Quebec\Concerns\InteractsWithPersonalData;
use JeffersonGoncalves\Quebec\Contracts\HasPersonalData;
use JeffersonGoncalves\Quebec\Enums\AnonymizeStrategy;

#[PersonalData('name', anonymize: AnonymizeStrategy::Mask)]
#[PersonalData('email', anonymize: AnonymizeStrategy::Hash)]
class TestUser extends Authenticatable implements HasPersonalData
{
    use InteractsWithPersonalData;

    protected $table = 'users';

    protected $guarded = [];

    public $timestamps = false;
}
