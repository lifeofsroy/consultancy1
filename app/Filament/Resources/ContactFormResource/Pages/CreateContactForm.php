<?php

namespace App\Filament\Resources\ContactFormResource\Pages;

use App\Filament\Resources\ContactFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactForm extends CreateRecord
{
    protected static string $resource = ContactFormResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Message Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
