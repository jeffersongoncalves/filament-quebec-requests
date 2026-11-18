<?php

use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\Filament\QuebecRequests\QuebecRequestsPlugin;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\Pages\CreatePrivacyRequest;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\Pages\ListPrivacyRequests;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\Pages\ViewPrivacyRequest;
use JeffersonGoncalves\Filament\QuebecRequests\Resources\PrivacyRequests\PrivacyRequestResource;
use JeffersonGoncalves\Filament\QuebecRequests\Tests\Fixtures\TestUser;
use JeffersonGoncalves\QuebecRequests\Enums\RequestStatus;
use JeffersonGoncalves\QuebecRequests\Enums\RequestType;
use JeffersonGoncalves\QuebecRequests\Facades\QuebecRequests;
use JeffersonGoncalves\QuebecRequests\Models\PrivacyRequest;
use Livewire\Livewire;

beforeEach(function () {
    $this->admin = TestUser::create(['name' => 'Admin', 'email' => 'admin@example.com']);
    $this->subject = TestUser::create(['name' => 'Maria', 'email' => 'maria@example.com']);

    $this->actingAs($this->admin);
});

function verifiedRequest(RequestType $type): PrivacyRequest
{
    return QuebecRequests::verify(QuebecRequests::open($type, test()->subject), test()->subject);
}

it('opens a request with the legal deadline', function () {
    $this->freezeSecond();

    Livewire::test(CreatePrivacyRequest::class)
        ->fillForm(['type' => 'access', 'requester_name' => 'Maria', 'requester_email' => 'maria@example.com'])
        ->call('create')
        ->assertHasNoFormErrors();

    $request = PrivacyRequest::sole();

    expect($request->type)->toBe(RequestType::Access)
        ->and($request->status)->toBe(RequestStatus::Pending)
        ->and($request->due_at->equalTo(now()->addDays(30)))->toBeTrue();
});

it('lists requests and filters the overdue ones', function () {
    $overdue = QuebecRequests::open(RequestType::Access);
    $this->travel(32)->days();
    $onTime = QuebecRequests::open(RequestType::Deletion);

    Livewire::test(ListPrivacyRequests::class)
        ->assertCanSeeTableRecords([$overdue, $onTime])
        ->filterTable('overdue')
        ->assertCanSeeTableRecords([$overdue])
        ->assertCanNotSeeTableRecords([$onTime]);

    expect(PrivacyRequestResource::getNavigationBadge())->toBe('2')
        ->and(PrivacyRequestResource::getNavigationBadgeColor())->toBe('danger');
});

it('verifies the requester and links the person', function () {
    $request = QuebecRequests::open(RequestType::Access);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('verify', ['subject_type' => TestUser::class, 'subject_id' => $this->subject->getKey()])
        ->assertHasNoActionErrors();

    $request->refresh();

    expect($request->isVerified())->toBeTrue()
        ->and($request->subject?->is($this->subject))->toBeTrue();
});

it('does not verify against an unknown record', function () {
    $request = QuebecRequests::open(RequestType::Access);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->callAction('verify', ['subject_type' => TestUser::class, 'subject_id' => 999]);

    expect($request->fresh()->isVerified())->toBeFalse();
});

it('fulfils an access request and offers the export', function () {
    Storage::fake('local');
    $request = verifiedRequest(RequestType::Access);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->callAction('fulfil')
        ->assertActionVisible('download')
        ->callAction('download')
        ->assertFileDownloaded("request-{$request->getKey()}.json");

    expect($request->fresh()->status)->toBe(RequestStatus::Completed);
    Storage::disk('local')->assertExists("quebec/requests/request-{$request->getKey()}.json");
});

it('anonymizes the person on a deletion request', function () {
    $request = verifiedRequest(RequestType::Deletion);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->callAction('fulfil');

    expect($this->subject->fresh()->name)->toBe('M****')
        ->and($request->fresh()->status)->toBe(RequestStatus::Completed);
});

it('completes manual rights with a response and rejects with a reason', function () {
    $manual = QuebecRequests::open(RequestType::Rectification);
    $rejected = QuebecRequests::open(RequestType::Access);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $manual->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('complete', ['response' => 'Address fixed.']);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $rejected->getKey()])
        ->callAction('reject', ['reason' => ''])
        ->assertHasActionErrors(['reason' => 'required']);

    Livewire::test(ViewPrivacyRequest::class, ['record' => $rejected->getKey()])
        ->callAction('reject', ['reason' => 'Identity not confirmed.']);

    expect($manual->fresh())->status->toBe(RequestStatus::Completed)->response->toBe('Address fixed.')
        ->and($rejected->fresh())->status->toBe(RequestStatus::Rejected)->response->toBe('Identity not confirmed.');

    Livewire::test(ViewPrivacyRequest::class, ['record' => $manual->getKey()])
        ->assertActionHidden('verify')
        ->assertActionHidden('complete')
        ->assertActionHidden('reject');
});

it('offers no extension unless one is configured, then once', function () {
    $this->freezeSecond();
    $request = QuebecRequests::open(RequestType::Access);
    $due = $request->due_at->copy();

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('extend');

    config()->set('quebec-requests.extension', '2 months');

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->callAction('extend', ['reason' => 'Records spread over several systems.']);

    expect($request->fresh()->due_at->equalTo($due->addMonths(2)))->toBeTrue();

    Livewire::test(ViewPrivacyRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('extend');
});

it('offers the same actions on the table rows', function () {
    $request = QuebecRequests::open(RequestType::Access);

    Livewire::test(ListPrivacyRequests::class)
        ->assertTableActionHidden('fulfil', $request)
        ->callTableAction('reject', $request, ['reason' => 'Duplicate.']);

    expect($request->fresh()->status)->toBe(RequestStatus::Rejected);
});

it('registers the resource with the fluent plugin options', function () {
    $plugin = QuebecRequestsPlugin::get()->navigationGroup('QUEBEC')->slug('dsar')->subjectModels([TestUser::class]);

    expect(PrivacyRequestResource::getNavigationGroup())->toBe('QUEBEC')
        ->and(PrivacyRequestResource::getSlug())->toBe('dsar')
        ->and($plugin->getSubjectModels())->toBe([TestUser::class])
        ->and(__('filament-quebec-requests::filament-quebec-requests.resource.plural_label'))->toBe('Privacy requests');
});
