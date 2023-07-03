<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Nuhel\FilamentCropper\Components\Cropper;
use Yepsua\Filament\Forms\Components\Captcha;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\UserResource\RelationManagers\FaqFormsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\CourseCommentsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\ServiceCommentsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\InstitutionCommentsRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Management';

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
                                    ->required(),

                                TextInput::make('email')
                                    ->required()
                                    ->email(),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('password')
                                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                    ->confirmed()
                                    ->hiddenOn('edit')
                                    ->required(fn (Page $livewire) => ($livewire instanceof CreateUser)),

                                TextInput::make('password_confirmation')
                                    ->password()
                                    ->hiddenOn('edit')
                                    ->required(fn (Page $livewire) => ($livewire instanceof CreateUser)),
                            ]),
                    ])
                    ->hiddenOn('edit'),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('email_verified_at'),

                                TextInput::make('provider')
                                    ->default('Registered')
                                    ->hint('Donot change the value')
                                    ->hintColor('primary')
                                    ->hiddenOn('edit'),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Cropper::make('profile_photo_path')
                            ->label('User DP')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return (string)str("profile-photos/bg" . $file->hashName());
                            })->enableDownload()
                            ->enableOpen()
                            ->zoomable(true)
                            ->enableZoomButtons()
                            ->enableImageRotation()
                            ->enableImageFlipping()
                            ->imageCropAspectRatio('1:1'),
                    ])
                    ->columnspan('full'),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('roles')
                                    ->multiple()
                                    ->relationship('roles', 'name')
                                    ->preload(),

                                Captcha::make('captcha'),
                            ]),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_photo_path')
                    ->label('Photo')
                    ->toggleable(),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('roles.name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

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
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FaqFormsRelationManager::class,
            ServiceCommentsRelationManager::class,
            CourseCommentsRelationManager::class,
            InstitutionCommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
