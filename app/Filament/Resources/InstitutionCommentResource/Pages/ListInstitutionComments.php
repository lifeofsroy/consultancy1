<?php

namespace App\Filament\Resources\InstitutionCommentResource\Pages;

use App\Filament\Resources\InstitutionCommentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstitutionComments extends ListRecords
{
    protected static string $resource = InstitutionCommentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
