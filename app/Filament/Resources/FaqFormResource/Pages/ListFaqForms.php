<?php

namespace App\Filament\Resources\FaqFormResource\Pages;

use App\Filament\Resources\FaqFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqForms extends ListRecords
{
    protected static string $resource = FaqFormResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
