<?php

namespace App\Filament\Pages\Widgets;

use App\Models\SocialLink;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as PageWidget;;

class SocialLinkWidgets extends PageWidget
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return SocialLink::query();
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
                    Grid::make(2)
                        ->schema([
                            TextInput::make('name')
                                ->required(),

                            Select::make('icon')
                                ->searchable()
                                ->options([
                                    'fab fa-facebook-f' => 'Facebook Icon',
                                    'fab fa-twitter' => 'Twitter Icon',
                                    'fab fa-linkedin-in' => 'Linkedin Icon',
                                    'fab fa-whatsapp' => 'Whatsapp Icon',
                                    'fab fa-youtube' => 'Youtube Icon',
                                ]),
                        ]),

                    Grid::make(1)
                        ->schema([
                            TextInput::make('url')
                                ->label('Link')
                                ->required()
                                ->url(),
                        ]),
                ]),

            DeleteAction::make(),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->form([
                    Grid::make(3)
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('name')
                                        ->required(),

                                    Select::make('icon')
                                        ->searchable()
                                        ->options([
                                            'fab fa-facebook-f' => 'Facebook Icon',
                                            'fab fa-twitter' => 'Twitter Icon',
                                            'fab fa-linkedin-in' => 'Linkedin Icon',
                                            'fab fa-whatsapp' => 'Whatsapp Icon',
                                            'fab fa-youtube' => 'Youtube Icon',
                                        ]),
                                ]),

                            Grid::make(1)
                                ->schema([
                                    TextInput::make('url')
                                        ->label('Link')
                                        ->required()
                                        ->url(),
                                ]),
                        ]),
                ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->wrap(),

            TextColumn::make('url')
                ->wrap(),

            IconColumn::make('status')
                ->boolean()
                ->sortable()
                ->toggle(),

            TextColumn::make('updated_at')
                ->date()
                ->color('primary')
                ->size('sm')
                ->label('Updated'),
        ];
    }
}
