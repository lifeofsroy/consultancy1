<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\CourseComment;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Yepsua\Filament\Forms\Components\Rating;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CourseCommentResource\Pages;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\CourseCommentResource\RelationManagers;

class CourseCommentResource extends Resource
{
    protected static ?string $model = CourseComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Course';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('course_id')
                                    ->relationship('course', 'title')
                                    ->label('Course'),

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
                TextColumn::make('course.title')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

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
                SelectFilter::make('course_id')
                    ->relationship('course', 'title')
                    ->label('Filter By Course'),
            ])
            ->actions([
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
            'index' => Pages\ListCourseComments::route('/'),
            'create' => Pages\CreateCourseComment::route('/create'),
            'edit' => Pages\EditCourseComment::route('/{record}/edit'),
        ];
    }
}
