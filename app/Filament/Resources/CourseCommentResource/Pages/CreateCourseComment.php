<?php

namespace App\Filament\Resources\CourseCommentResource\Pages;

use App\Filament\Resources\CourseCommentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseComment extends CreateRecord
{
    protected static string $resource = CourseCommentResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Course Comment Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
