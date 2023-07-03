<?php

namespace App\Filament\Pages\Widgets;

use App\Models\Plugin;
use App\Models\HomeFaq;
use App\Models\ContactInfo;
use App\Models\HomeWelcome;
use App\Models\WorkProcess;
use App\Models\AboutWelcome;
use App\Models\CallToAction;
use App\Models\MissionVision;
use App\Models\HomeAppointment;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as PageWidget;

class PluginWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Plugin::query();
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
                    Card::make()
                        ->schema([
                            TextInput::make('wh_number')
                                ->label('Whatsapp Number'),

                            TextInput::make('tawk_src')
                                ->label('Tawk Source URL'),

                        ])
                        ->columnspan('full'),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            ToggleColumn::make('is_whatsapp')
                ->label('Whatsapp'),

            TextColumn::make('wh_number')
                ->label('Whatsapp Number'),

            ToggleColumn::make('is_tawk')
                ->label('Tawk'),

            TextColumn::make('tawk_src')
                ->label('Tawk Source URL')
                ->wrap(),

            TextColumn::make('updated_at')
                ->since()
                ->color('primary')
                ->size('sm')
                ->label('Updated'),
        ];
    }
}
