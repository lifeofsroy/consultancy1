<?php

namespace App\Filament\Resources\AppointmentFormResource\Pages;

use App\Filament\Resources\AppointmentFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppointmentForm extends EditRecord
{
    protected static string $resource = AppointmentFormResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Appointment updated';
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
