<?php

namespace App\Filament\Resources\ContactFormResource\Pages;

use App\Filament\Resources\ContactFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactForm extends EditRecord
{
    protected static string $resource = ContactFormResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Message updated';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
