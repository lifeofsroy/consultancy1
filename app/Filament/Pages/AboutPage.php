<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AboutPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.about-page';

    protected static ?string $navigationGroup = 'Page';

    protected static function shouldRegisterNavigation(): bool
    {
        if ((auth()->user()->hasPermissionTo('Update About Page')) || (auth()->user()->hasRole('Admin'))) {
            return true;
        }
        return false;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\AboutWelcomeWidgets::class,
            Widgets\MissionVisionWidgets::class,
            Widgets\WorkProcessWidgets::class,
        ];
    }
}
