<?php

namespace App\Filament\Resources\AdmissionFormResource\Pages;

use App\Filament\Resources\AdmissionFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmissionForm extends EditRecord
{
    protected static string $resource = AdmissionFormResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Admision Form updated';
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
