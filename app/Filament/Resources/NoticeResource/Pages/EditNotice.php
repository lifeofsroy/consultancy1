<?php

namespace App\Filament\Resources\NoticeResource\Pages;

use App\Filament\Resources\NoticeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNotice extends EditRecord
{
    protected static string $resource = NoticeResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Notice updated';
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
