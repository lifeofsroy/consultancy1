<?php

namespace App\Filament\Resources\AdmissionFormResource\Pages;

use App\Filament\Resources\AdmissionFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmissionForm extends CreateRecord
{
    protected static string $resource = AdmissionFormResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Admission Complete';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
