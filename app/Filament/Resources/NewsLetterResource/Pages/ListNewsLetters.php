<?php

namespace App\Filament\Resources\NewsLetterResource\Pages;

use App\Filament\Resources\NewsLetterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsLetters extends ListRecords
{
    protected static string $resource = NewsLetterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
