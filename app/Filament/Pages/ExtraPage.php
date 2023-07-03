<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ExtraPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.extra-page';

    protected static ?string $navigationGroup = 'Page';

    protected static function shouldRegisterNavigation(): bool
    {
        if ((auth()->user()->hasPermissionTo('Update Extra Page')) || (auth()->user()->hasRole('Admin'))) {
            return true;
        }
        return false;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\TermConditionWidgets::class,
            Widgets\PrivacyPolicyWidgets::class,
            Widgets\CookiePolicyWidgets::class,
        ];
    }
}
