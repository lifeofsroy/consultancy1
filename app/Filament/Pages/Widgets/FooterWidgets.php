<?php

namespace App\Filament\Pages\Widgets;

use App\Models\Footer;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Nuhel\FilamentCropper\Components\Cropper;
use Filament\Widgets\TableWidget as PageWidget;

class FooterWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Footer::query();
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
                    Section::make('Copyright & Description')
                        ->schema([
                            TextInput::make('copyright')
                                ->required(),

                            Textarea::make('desc')
                                ->label('Description')
                                ->required()
                                ->reactive()
                                ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                ->maxlength(180),
                        ])
                        ->collapsed(),

                    Section::make('Footer Logo')
                        ->schema([
                            FileUpload::make('logo')
                                ->directory('logo/footer')
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
                ->label('Footer Logo'),

            TextColumn::make('copyright')
                ->wrap(),

            TextColumn::make('updated_at')
                ->since()
                ->color('primary')
                ->size('sm')
                ->label('Updated'),
        ];
    }
}
