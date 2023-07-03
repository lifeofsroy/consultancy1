<?php

namespace App\Filament\Resources\InstitutionCommentResource\Pages;

use App\Filament\Resources\InstitutionCommentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInstitutionComment extends CreateRecord
{
    protected static string $resource = InstitutionCommentResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Institution Comment Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
