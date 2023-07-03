<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Notice;
use Illuminate\Support\Str;
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
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use Nuhel\FilamentCropper\Components\Cropper;
use App\Filament\Resources\NoticeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NoticeResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class NoticeResource extends Resource
{
    protected static ?string $model = Notice::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Section';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->reactive()
                                    ->required()
                                    ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                                    ->maxlength(100)
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),

                        Textarea::make('short')
                            ->label('Short Description')
                            ->required()
                            ->hint(fn ($state, $component) => 'left: ' . $component->getMaxLength() - strlen($state) . ' characters')
                            ->maxlength(200)
                            ->reactive(),
                    ]),

                Card::make()
                    ->schema([
                        FileUpload::make('doc')
                            ->label('Document')
                            ->directory('notice/doc')
                            ->acceptedFileTypes(['application/pdf'])
                            ->enableDownload()
                            ->enableOpen(),
                    ]),

                TinyEditor::make('desc')
                    ->required()
                    ->columnSpan(2)
                    ->label('Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                IconColumn::make('status')
                    ->boolean()
                    ->toggleable()
                    ->sortable()
                    ->toggle(),

                CheckboxColumn::make('header')
                    ->toggleable()
                    ->label('Header'),

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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNotices::route('/'),
            'create' => Pages\CreateNotice::route('/create'),
            'edit' => Pages\EditNotice::route('/{record}/edit'),
        ];
    }
}
