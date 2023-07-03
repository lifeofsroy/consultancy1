<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class HomePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.home-page';

    protected static ?string $navigationGroup = 'Page';

    protected static function shouldRegisterNavigation(): bool
    {
        if ((auth()->user()->hasPermissionTo('Update Home Page')) || (auth()->user()->hasRole('Admin'))) {
            return true;
        }
        return false;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\HomeWelcomeWidgets::class,
            Widgets\CallToActionWidgets::class,
            Widgets\HomeFaqWidgets::class,
            Widgets\HomeAppointmentWidgets::class,
        ];
    }
}
