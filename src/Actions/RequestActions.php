<?php

namespace JeffersonGoncalves\Filament\QuebecRequests\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\Filament\QuebecRequests\QuebecRequestsPlugin;
use JeffersonGoncalves\QuebecRequests\Models\PrivacyRequest;
use JeffersonGoncalves\QuebecRequests\RequestManager;
use LogicException;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Row and view-page actions: each one is a thin call to laravel-quebec-requests's RequestManager.
 */
class RequestActions
{
    /**
     * @return list<Action>
     */
    public static function all(): array
    {
        return [static::verify(), static::fulfil(), static::complete(), static::reject(), static::extend(), static::download()];
    }

    public static function verify(): Action
    {
        return Action::make('verify')
            ->label(__('filament-quebec-requests::filament-quebec-requests.actions.verify.label'))
            ->icon('heroicon-o-identification')
            ->color('info')
            ->visible(fn (PrivacyRequest $record): bool => $record->isOpen())
            ->modalDescription(__('filament-quebec-requests::filament-quebec-requests.actions.verify.description'))
            ->fillForm(fn (PrivacyRequest $record): array => [
                'subject_type' => static::subjectClass($record),
                'subject_id' => $record->getAttribute('subject_id'),
            ])
            ->schema([
                Select::make('subject_type')
                    ->label(__('filament-quebec-requests::filament-quebec-requests.fields.subject_type'))
                    ->options(fn (): array => collect(QuebecRequestsPlugin::get()->getSubjectModels())
                        ->mapWithKeys(fn (string $model): array => [$model => class_basename($model)])
                        ->all())
                    ->required(),
                TextInput::make('subject_id')
                    ->label(__('filament-quebec-requests::filament-quebec-requests.fields.subject_id'))
                    ->required(),
            ])
            ->action(function (PrivacyRequest $record, array $data, Action $action): void {
                $model = $data['subject_type'];

                // Only the listed models: never instantiate a class name taken from the request.
                $subject = in_array($model, QuebecRequestsPlugin::get()->getSubjectModels(), true)
                    ? $model::query()->find($data['subject_id'])
                    : null;

                if (! $subject instanceof Model) {
                    Notification::make()->danger()->title(__('filament-quebec-requests::filament-quebec-requests.actions.verify.not_found'))->send();
                    $action->halt();

                    return;
                }

                app(RequestManager::class)->verify($record, $subject);

                Notification::make()->success()->title(__('filament-quebec-requests::filament-quebec-requests.actions.verify.success'))->send();
            });
    }

    public static function fulfil(): Action
    {
        return Action::make('fulfil')
            ->label(__('filament-quebec-requests::filament-quebec-requests.actions.fulfil.label'))
            ->icon('heroicon-o-play')
            ->color(fn (PrivacyRequest $record): string => $record->type->value === 'deletion' ? 'danger' : 'success')
            ->visible(fn (PrivacyRequest $record): bool => $record->isOpen() && $record->isVerified() && $record->type->isAutomatic())
            ->requiresConfirmation()
            ->modalDescription(fn (PrivacyRequest $record): string => __('filament-quebec-requests::filament-quebec-requests.actions.fulfil.description.'.$record->type->value))
            ->schema([
                Textarea::make('response')
                    ->label(__('filament-quebec-requests::filament-quebec-requests.fields.response')),
            ])
            ->action(function (PrivacyRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->fulfil($record, $data['response'] ?? null), 'fulfil');
            });
    }

    public static function complete(): Action
    {
        return Action::make('complete')
            ->label(__('filament-quebec-requests::filament-quebec-requests.actions.complete.label'))
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->visible(fn (PrivacyRequest $record): bool => $record->isOpen() && ! $record->type->isAutomatic())
            ->modalDescription(__('filament-quebec-requests::filament-quebec-requests.actions.complete.description'))
            ->schema([
                Textarea::make('response')
                    ->label(__('filament-quebec-requests::filament-quebec-requests.fields.response'))
                    ->required(),
            ])
            ->action(function (PrivacyRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->complete($record, $data['response']), 'complete');
            });
    }

    public static function reject(): Action
    {
        return Action::make('reject')
            ->label(__('filament-quebec-requests::filament-quebec-requests.actions.reject.label'))
            ->icon('heroicon-o-x-circle')
            ->color('danger')
            ->visible(fn (PrivacyRequest $record): bool => $record->isOpen())
            ->modalDescription(__('filament-quebec-requests::filament-quebec-requests.actions.reject.description'))
            ->schema([
                Textarea::make('reason')
                    ->label(__('filament-quebec-requests::filament-quebec-requests.fields.reason'))
                    ->required(),
            ])
            ->action(function (PrivacyRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->reject($record, $data['reason']), 'reject');
            });
    }

    public static function extend(): Action
    {
        return Action::make('extend')
            ->label(__('filament-quebec-requests::filament-quebec-requests.actions.extend.label'))
            ->icon('heroicon-o-clock')
            ->color('warning')
            ->visible(fn (PrivacyRequest $record): bool => $record->isOpen() && $record->extended_at === null && filled(config('quebec-requests.extension')))
            ->modalDescription(__('filament-quebec-requests::filament-quebec-requests.actions.extend.description'))
            ->schema([
                Textarea::make('reason')
                    ->label(__('filament-quebec-requests::filament-quebec-requests.fields.extension_reason'))
                    ->required(),
            ])
            ->action(function (PrivacyRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->extend($record, $data['reason']), 'extend');
            });
    }

    public static function download(): Action
    {
        return Action::make('download')
            ->label(__('filament-quebec-requests::filament-quebec-requests.actions.download.label'))
            ->icon('heroicon-o-arrow-down-tray')
            ->color('gray')
            ->visible(fn (PrivacyRequest $record): bool => filled($record->export_path))
            ->action(fn (PrivacyRequest $record): StreamedResponse => Storage::disk(config('quebec-requests.disk'))
                ->download((string) $record->export_path));
    }

    /**
     * @return class-string<Model>|null
     */
    protected static function subjectClass(PrivacyRequest $record): ?string
    {
        $type = $record->getAttribute('subject_type');

        if (! is_string($type)) {
            return null;
        }

        $class = Model::getActualClassNameForMorph($type);

        return is_subclass_of($class, Model::class) ? $class : null;
    }

    protected static function attempt(callable $callback, string $action): void
    {
        try {
            $callback();
        } catch (LogicException $e) {
            // The manager guards the workflow (closed, unverified, no subject): surface why instead of a 500.
            Notification::make()->danger()->title($e->getMessage())->send();

            return;
        }

        Notification::make()->success()->title(__("filament-quebec-requests::filament-quebec-requests.actions.{$action}.success"))->send();
    }
}
