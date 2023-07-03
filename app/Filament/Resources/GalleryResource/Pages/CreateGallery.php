<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Photo Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
