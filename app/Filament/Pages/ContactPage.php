<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ContactPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.contact-page';

    protected static ?string $navigationGroup = 'Page';

    protected static function shouldRegisterNavigation(): bool
    {
        if ((auth()->user()->hasPermissionTo('Update Contact Page')) || (auth()->user()->hasRole('Admin'))) {
            return true;
        }
        return false;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\ContactInfoWidgets::class,
            Widgets\SocialLinkWidgets::class,
        ];
    }
}
