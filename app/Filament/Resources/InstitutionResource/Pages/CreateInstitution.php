<?php

namespace App\Filament\Resources\InstitutionResource\Pages;

use App\Filament\Resources\InstitutionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInstitution extends CreateRecord
{
    protected static string $resource = InstitutionResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Institution Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
