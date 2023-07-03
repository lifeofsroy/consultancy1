<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ServiceCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Nuhel\FilamentCropper\Components\Cropper;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Tables\IconColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceCategoryResource\Pages;
use App\Filament\Resources\ServiceCategoryResource\RelationManagers;
use App\Filament\Resources\ServiceCategoryResource\RelationManagers\ServicesRelationManager;

class ServiceCategoryResource extends Resource
{
    protected static ?string $model = ServiceCategory::class;

    protected static ?string $navigationGroup = 'Service';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->reactive()
                                    ->required()
                                    ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                    ->maxlength(50)
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                IconPicker::make('icon')
                                    ->columnspan('full')
                                    ->required()
                                    ->preload(),
                            ]),
                    ])
                    ->columnspan('full'),

                Card::make()
                    ->schema([
                        Textarea::make('short')
                            ->label('Short Description')
                            ->required()
                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                            ->maxlength(90)
                            ->reactive(),
                    ])
                    ->columnspan('full'),

                Card::make()
                    ->schema([
                        Cropper::make('image')
                            ->label('Cover Image')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return (string)str("service/category/image" . $file->hashName());
                            })->enableDownload()
                            ->enableOpen()
                            ->required()
                            ->zoomable(true)
                            ->enableZoomButtons()
                            ->enableImageRotation()
                            ->enableImageFlipping()
                            ->imageCropAspectRatio('10:8'),
                    ])
                    ->columnspan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->toggleable(),

                IconColumn::make('icon'),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->toggleable()
                    ->sortable()
                    ->toggle(),

                TextColumn::make('updated_at')
                    ->date()
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
            ServicesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceCategories::route('/'),
            'create' => Pages\CreateServiceCategory::route('/create'),
            'edit' => Pages\EditServiceCategory::route('/{record}/edit'),
        ];
    }
}
