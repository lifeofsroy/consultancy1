<?php

namespace App\Filament\Pages\Widgets;

use App\Models\AboutWelcome;
use App\Models\CallToAction;
use App\Models\HomeAppointment;
use App\Models\HomeFaq;
use App\Models\HomeWelcome;
use App\Models\MissionVision;
use App\Models\WorkProcess;
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

class HomeFaqWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return HomeFaq::query();
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

                            TextInput::make('subtitle')
                                ->required(),
                        ])
                        ->collapsed(),

                    Section::make('Images')
                        ->schema([
                            FileUpload::make('image')
                                ->directory('home/faq')
                                ->image()
                                ->enableOpen()
                                ->enableDownload()
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('10:9'),
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

            TextColumn::make('subtitle')
                ->wrap(),

            TextColumn::make('updated_at')
                ->since()
                ->color('primary')
                ->size('sm')
                ->label('Updated'),
        ];
    }
}
