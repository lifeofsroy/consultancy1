<?php

namespace App\Filament\Resources\FaqFormResource\Pages;

use App\Filament\Resources\FaqFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaqForm extends EditRecord
{
    protected static string $resource = FaqFormResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Query updated';
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
