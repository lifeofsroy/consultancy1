<?php

namespace App\Filament\Resources\InstitutionResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
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
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use Nuhel\FilamentCropper\Components\Cropper;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Category & Institution')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Select::make('course_category_id')
                                ->relationship('courseCategory', 'name')
                                ->label('Course Category'),

                            Select::make('institution_id')
                                ->relationship('institution', 'name')
                                ->label('Institution'),
                        ]),

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
                                ->directory('course/doc')
                                ->acceptedFileTypes(['application/pdf'])
                                ->enableDownload()
                                ->enableOpen(),
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
                                        ->label('Course Thumbnail')
                                        ->required()
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string)str("course/thumb/thumb" . $file->hashName());
                                        })->enableDownload()
                                        ->enableOpen()
                                        ->zoomable(true)
                                        ->enableZoomButtons()
                                        ->enableImageRotation()
                                        ->enableImageFlipping()
                                        ->imageResizeTargetWidth('391')
                                        ->imageResizeTargetHeight('250'),
                                ]),

                            Card::make()
                                ->schema([
                                    Cropper::make('image')
                                        ->label('Course Image')
                                        ->required()
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string)str("course/image/image" . $file->hashName());
                                        })->enableDownload()
                                        ->enableOpen()
                                        ->zoomable(true)
                                        ->enableZoomButtons()
                                        ->enableImageRotation()
                                        ->enableImageFlipping()
                                        ->imageResizeTargetWidth('789')
                                        ->imageResizeTargetHeight('500'),
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

                TextColumn::make('courseCategory.name')
                    ->sortable()
                    ->toggleable()
                    ->searchable()
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
