<?php

namespace App\Filament\Pages\Widgets;

use App\Models\PrivacyPolicy;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as PageWidget;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PrivacyPolicyWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return PrivacyPolicy::query();
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make()
                ->form([
                    TextInput::make('title')
                        ->required(),

                    TinyEditor::make('desc')
                        ->label('Description')
                        ->columnSpan('full'),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')
                ->wrap(),

            TextColumn::make('updated_at')
                ->since()
                ->color('primary')
                ->size('sm')
                ->label('Updated'),
        ];
    }
}
