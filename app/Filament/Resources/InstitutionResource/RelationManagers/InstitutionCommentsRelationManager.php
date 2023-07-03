<?php

namespace App\Filament\Resources\InstitutionResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Yepsua\Filament\Forms\Components\Rating;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class InstitutionCommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'institutionComments';

    protected static ?string $recordTitleAttribute = 'desc';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('institution_id')
                                    ->relationship('institution', 'name')
                                    ->label('Institution'),

                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('User'),
                            ]),
                    ])
                    ->columnspan('full'),

                Card::make()
                    ->schema([
                        Rating::make('rating')
                            ->options([
                                'Poor',
                                'Acceptable',
                                'Good',
                                'Very Good',
                                'Excellent',
                            ])
                            ->effects(false),

                        Textarea::make('desc')
                            ->reactive()
                            ->required(),
                    ])
                    ->columnspan('full'),
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

                IconColumn::make('status')
                    ->boolean()
                    ->toggleable()
                    ->sortable()
                    ->toggle(),

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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
