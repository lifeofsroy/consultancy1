<?php

namespace App\Filament\Resources\AppointmentFormResource\Pages;

use App\Filament\Resources\AppointmentFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointmentForms extends ListRecords
{
    protected static string $resource = AppointmentFormResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
