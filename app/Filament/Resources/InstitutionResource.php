<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Institution;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InstitutionResource\Pages;
use App\Filament\Resources\InstitutionResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\InstitutionResource\RelationManagers\CoursesRelationManager;
use App\Filament\Resources\InstitutionResource\RelationManagers\InstitutionCommentsRelationManager;

class InstitutionResource extends Resource
{
    protected static ?string $model = Institution::class;

    protected static ?string $navigationGroup = 'Institution';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Name')
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

                        TextInput::make('short')
                            ->label('Short Description')
                            ->required()
                            ->default('No Need To Add'),
                    ])
                    ->collapsed(),

                Section::make('Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('location'),

                                TextInput::make('type'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('contact'),

                                TextInput::make('website'),
                            ]),

                        Grid::make(1)
                            ->schema([
                                Textarea::make('mapurl')
                                    ->rows(4)
                                    ->required(),
                            ]),
                    ])
                    ->collapsed(),

                Section::make('Description')
                    ->schema([
                        Card::make()
                            ->schema([
                                FileUpload::make('doc')
                                    ->label('Document')
                                    ->directory('institution/doc')
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
                                            ->label('Institution Thumbnail')
                                            ->required()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("institution/thumb/thumb" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->zoomable(true)
                                            ->enableZoomButtons()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->imageCropAspectRatio('1:1'),
                                    ]),

                                Card::make()
                                    ->schema([
                                        Cropper::make('image')
                                            ->label('Institution Image')
                                            ->required()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("institution/image/image" . $file->hashName());
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

                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                IconColumn::make('status')
                    ->boolean()
                    ->toggleable()
                    ->sortable()
                    ->toggle(),

                CheckboxColumn::make('featured')
                    ->toggleable()
                    ->label('Homepage'),

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
            CoursesRelationManager::class,
            InstitutionCommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstitutions::route('/'),
            'create' => Pages\CreateInstitution::route('/create'),
            'edit' => Pages\EditInstitution::route('/{record}/edit'),
        ];
    }
}
