<?php

namespace App\Filament\Resources\TestimonialResource\Pages;

use App\Filament\Resources\TestimonialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimonial extends CreateRecord
{
    protected static string $resource = TestimonialResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Testimonial Added';
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
