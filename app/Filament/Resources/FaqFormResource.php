<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\FaqForm;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\FaqFormResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FaqFormResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;

class FaqFormResource extends Resource
{
    protected static ?string $model = FaqForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label('User'),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('category')
                                    ->required(),

                                TextInput::make('more')
                                    ->required(),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Textarea::make('question')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('question')
                    ->sortable()
                    ->toggleable()
                    ->searchable()
                    ->wrap(),

                TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->color('primary')
                    ->size('sm')
                    ->label('Updated'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqForms::route('/'),
            'create' => Pages\CreateFaqForm::route('/create'),
            'edit' => Pages\EditFaqForm::route('/{record}/edit'),
        ];
    }
}
