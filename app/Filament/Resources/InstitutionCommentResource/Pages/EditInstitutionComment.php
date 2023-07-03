<?php

namespace App\Filament\Resources\InstitutionCommentResource\Pages;

use App\Filament\Resources\InstitutionCommentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstitutionComment extends EditRecord
{
    protected static string $resource = InstitutionCommentResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Institution Comment updated';
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
