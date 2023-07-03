<?php

namespace App\Filament\Resources\AdmissionFormResource\Pages;

use App\Filament\Resources\AdmissionFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionForms extends ListRecords
{
    protected static string $resource = AdmissionFormResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
