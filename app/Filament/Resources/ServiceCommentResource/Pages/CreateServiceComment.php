<?php

namespace App\Filament\Resources\ServiceCommentResource\Pages;

use App\Filament\Resources\ServiceCommentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceComment extends CreateRecord
{
    protected static string $resource = ServiceCommentResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Service Comment Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
