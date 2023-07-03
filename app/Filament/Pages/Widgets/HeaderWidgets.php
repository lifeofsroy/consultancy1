<?php

namespace App\Filament\Pages\Widgets;

use App\Models\Header;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Nuhel\FilamentCropper\Components\Cropper;
use Filament\Widgets\TableWidget as PageWidget;

class HeaderWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Header::query();
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
                    Section::make('Contacts')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('phone')
                                        ->required()
                                        ->tel()
                                        ->numeric()
                                        ->reactive()
                                        ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                        ->maxlength(10),

                                    TextInput::make('email')
                                        ->required()
                                        ->email(),
                                ]),
                        ])
                        ->collapsed(),

                    Section::make('Logo')
                        ->schema([
                            FileUpload::make('logo')
                                ->directory('logo/header')
                                ->label('Header Logo')
                                ->image()
                                ->enableOpen()
                                ->enableDownload()
                                ->imageResizeMode('cover')
                                ->imageResizeTargetWidth('198')
                                ->imageResizeTargetHeight('55'),

                            FileUpload::make('mlogo')
                                ->directory('logo/header')
                                ->label('Mobile Logo')
                                ->image()
                                ->enableOpen()
                                ->enableDownload()
                                ->imageResizeMode('cover')
                                ->imageResizeTargetWidth('198')
                                ->imageResizeTargetHeight('55'),
                        ])
                        ->collapsed(),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('logo')
                ->label('Header Logo'),

            ImageColumn::make('mlogo')
                ->label('Mobile Logo'),

            TextColumn::make('phone')
                ->wrap(),

            TextColumn::make('email')
                ->wrap(),

            TextColumn::make('updated_at')
                ->since()
                ->color('primary')
                ->size('sm')
                ->label('Updated'),
        ];
    }
}
