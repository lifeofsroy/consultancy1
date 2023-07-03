<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Actions\DeleteBulkAction;
use Nuhel\FilamentCropper\Components\Cropper;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\ServiceResource\RelationManagers\FaqsRelationManager;
use App\Filament\Resources\ServiceResource\RelationManagers\ServiceCommentsRelationManager;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationGroup = 'Service';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Service Category')
                    ->schema([
                        Select::make('service_category_id')
                            ->relationship('serviceCategory', 'name')
                            ->label('Service Category'),
                    ])
                    ->collapsed(),

                Section::make('Title & Short')
                    ->schema([
                        TextInput::make('title')
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

                        Textarea::make('short')
                            ->label('Short Description')
                            ->required()
                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                            ->maxlength(100)
                            ->reactive(),
                    ])
                    ->collapsed(),

                Section::make('Description')
                    ->schema([
                        Card::make()
                            ->schema([
                                FileUpload::make('doc')
                                    ->label('Document')
                                    ->directory('service/doc')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->enableDownload()
                                    ->enableOpen()
                                    ->preserveFilenames(),
                            ]),

                        TinyEditor::make('desc')
                            ->required()
                            ->columnSpan(2)
                            ->label('Description'),
                    ])
                    ->collapsed(),

                Section::make('Thumbnail & Image')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Card::make()
                                    ->schema([
                                        Cropper::make('thumb')
                                            ->label('Service Thumbnail')
                                            ->required()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("service/thumb/thumb" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->zoomable(true)
                                            ->enableZoomButtons()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->imageCropAspectRatio('10:8'),
                                    ]),

                                Card::make()
                                    ->schema([
                                        Cropper::make('image')
                                            ->label('Service Image')
                                            ->required()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("service/image/image" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->zoomable(true)
                                            ->enableZoomButtons()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->imageCropAspectRatio('20:13'),
                                    ]),
                            ]),
                    ])
                    ->collapsed(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumb')
                    ->toggleable(),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('serviceCategory.name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                IconColumn::make('status')
                    ->boolean()
                    ->toggleable()
                    ->sortable()
                    ->toggle(),

                CheckboxColumn::make('featured')
                    ->toggleable()
                    ->label('Homepage'),

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
                SelectFilter::make('service_category_id')
                    ->relationship('serviceCategory', 'name')
                    ->label('Filter By Category'),

                SelectFilter::make('status')
                    ->options([
                        '1' => 'Activated',
                        '0' => 'Deactivated',
                    ])
                    ->label('Filter By Status'),

                SelectFilter::make('featured')
                    ->options([
                        '1' => 'On',
                        '0' => 'Off',
                    ])
                    ->label('Show On Homepage'),
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
            FaqsRelationManager::class,
            ServiceCommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
