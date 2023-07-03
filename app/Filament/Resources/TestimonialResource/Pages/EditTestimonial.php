<?php

namespace App\Filament\Resources\TestimonialResource\Pages;

use App\Filament\Resources\TestimonialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestimonial extends EditRecord
{
    protected static string $resource = TestimonialResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Testimonial updated';
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
