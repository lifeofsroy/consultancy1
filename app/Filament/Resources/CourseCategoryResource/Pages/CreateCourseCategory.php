<?php

namespace App\Filament\Resources\CourseCategoryResource\Pages;

use App\Filament\Resources\CourseCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseCategory extends CreateRecord
{
    protected static string $resource = CourseCategoryResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Course Category Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
