<?php

namespace App\Filament\Resources\ServiceCategoryResource\Pages;

use App\Filament\Resources\ServiceCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceCategory extends CreateRecord
{
    protected static string $resource = ServiceCategoryResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Service Category Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
