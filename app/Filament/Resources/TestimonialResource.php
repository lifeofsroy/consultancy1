<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Testimonial;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use Yepsua\Filament\Forms\Components\Rating;
use Filament\Tables\Actions\DeleteBulkAction;
use Nuhel\FilamentCropper\Components\Cropper;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Section';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('name')
                                    ->required(),

                                TextInput::make('designation')
                                    ->required(),

                                Rating::make('rating')
                                    ->options([
                                        'Poor',
                                        'Acceptable',
                                        'Good',
                                        'Very Good',
                                        'Excellent',
                                    ])
                                    ->effects(false),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Textarea::make('desc')
                            ->label('Description')
                            ->required()
                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                            ->maxlength(100)
                            ->reactive(),
                    ]),

                Card::make()
                    ->schema([
                        Cropper::make('image')
                            ->label('User Image')
                            ->required()
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return (string)str("testimonial/image" . $file->hashName());
                            })->enableDownload()
                            ->enableOpen()
                            ->zoomable(true)
                            ->enableZoomButtons()
                            ->enableImageRotation()
                            ->enableImageFlipping()
                            ->imageCropAspectRatio('1:1'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->toggleable(),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('rating')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

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
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
