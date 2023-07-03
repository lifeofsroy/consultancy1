<?php

namespace App\Filament\Resources\NewsLetterResource\Pages;

use App\Filament\Resources\NewsLetterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsLetter extends CreateRecord
{
    protected static string $resource = NewsLetterResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Email Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
