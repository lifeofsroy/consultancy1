<?php

namespace App\Filament\Pages\Widgets;

use App\Models\AboutWelcome;
use App\Models\MissionVision;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as PageWidget;

class MissionVisionWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return MissionVision::query();
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
                    Section::make('Title')
                        ->schema([
                            TextInput::make('title')
                                ->required(),
                        ])
                        ->collapsed(),

                    Section::make('Images')
                        ->schema([
                            FileUpload::make('image')
                                ->directory('about/mission')
                                ->image()
                                ->enableOpen()
                                ->enableDownload()
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('1:1')
                                ->imageResizeTargetWidth('219')
                                ->imageResizeTargetHeight('213'),
                        ])
                        ->collapsed(),

                    Section::make('Description')
                        ->schema([
                            Textarea::make('desc')
                                ->label('Description')
                                ->rows(10)
                                ->reactive()
                                ->required()
                                ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                ->maxlength(800),
                        ])
                        ->collapsed(),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('image'),

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
