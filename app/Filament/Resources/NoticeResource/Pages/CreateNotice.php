<?php

namespace App\Filament\Resources\NoticeResource\Pages;

use App\Filament\Resources\NoticeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNotice extends CreateRecord
{
    protected static string $resource = NoticeResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Notice Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
