<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SystemSetting extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.system-setting';

    protected static ?string $navigationGroup = 'Setting';

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
            Widgets\PluginWidgets::class,
        ];
    }
}
