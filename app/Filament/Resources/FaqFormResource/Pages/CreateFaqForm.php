<?php

namespace App\Filament\Resources\FaqFormResource\Pages;

use App\Filament\Resources\FaqFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFaqForm extends CreateRecord
{
    protected static string $resource = FaqFormResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Query Registered';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
