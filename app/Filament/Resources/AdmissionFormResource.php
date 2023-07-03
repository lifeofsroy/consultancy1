<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\AdmissionForm;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Nuhel\FilamentCropper\Components\Cropper;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AdmissionFormResource\Pages;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\AdmissionFormResource\RelationManagers;

class AdmissionFormResource extends Resource
{
    protected static ?string $model = AdmissionForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('first_name')
                                    ->required(),

                                TextInput::make('middle_name'),

                                TextInput::make('last_name')
                                    ->required(),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('email')
                                    ->required(),

                                TextInput::make('phone')
                                    ->required(),

                                TextInput::make('alt_phone')
                                    ->label('Alternate Phone'),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('dob')
                                    ->required()
                                    ->label('Date of Birth')
                                    ->maxDate(now())
                                    ->displayFormat('F j, Y')
                                    ->timezone('Asia/Kolkata'),

                                Select::make('gender')
                                    ->required()
                                    ->options([
                                        'Male' => 'Male',
                                        'Female' => 'Female',
                                        'Other' => 'Other',
                                    ]),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('father_name')
                                    ->label('Father\'s Name')
                                    ->required(),

                                TextInput::make('mother_name')
                                    ->label('Mother\'s Name')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('guar_name')
                                    ->label('Guardian\'s Name')
                                    ->required(),

                                TextInput::make('guar_ph')
                                    ->label('Guardian\'s Phone')
                                    ->required(),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Toggle::make('addr_same')
                            ->label('Current Address is Same')
                            ->reactive(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('parma_city')
                                    ->label('Parmanent City / Village')
                                    ->required(),

                                TextInput::make('parma_po')
                                    ->label('Parmanent P.O.')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('parma_ps')
                                    ->label('Parmanent P.S.')
                                    ->required(),

                                TextInput::make('parma_dist')
                                    ->label('Parmanent District')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('parma_state')
                                    ->label('Parmanent State')
                                    ->required(),

                                TextInput::make('parma_pin')
                                    ->label('Parmanent PIN')
                                    ->required(),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('corren_city')
                                    ->label('Current City / Village'),

                                TextInput::make('corren_po')
                                    ->label('Current P.O.'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('corren_ps')
                                    ->label('Current P.S.'),

                                TextInput::make('corren_dist')
                                    ->label('Current District'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('corren_state')
                                    ->label('Current State')
                                    ->requiredWith('addr_same')
                                    ->reactive(),

                                TextInput::make('corren_pin')
                                    ->label('Current PIN')
                                    ->requiredWith('addr_same')
                                    ->reactive(),
                            ]),
                    ])
                    ->hidden(
                        fn (Closure $get): bool => $get('addr_same') == true
                    ),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('qualifi_name')
                                    ->label('Last Qualification')
                                    ->required()
                                    ->options([
                                        'B.Sc' => 'B.Sc',
                                        'M.Sc' => 'M.Sc',
                                        'B.A' => 'B.A',
                                        'M.A' => 'M.A',
                                    ]),

                                TextInput::make('qualifi_year')
                                    ->label('Year of Passing'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('qualifi_coll')
                                    ->label('Board Name'),

                                TextInput::make('qualifi_mark')
                                    ->label('Passing Percentage')
                                    ->suffix('%'),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Select::make('course_id')
                                    ->relationship('course', 'title')
                                    ->label('Course')
                                    ->reactive(),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Card::make()
                                    ->schema([
                                        Cropper::make('marksheet_img')
                                            ->label('Marksheet')
                                            ->required()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("admission/marksheet" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->imageResizeTargetWidth('770')
                                            ->imageResizeTargetHeight('399'),
                                    ]),

                                Card::make()
                                    ->schema([
                                        Cropper::make('user_img')
                                            ->label('Photo')
                                            ->required()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                                return (string)str("admission/photo" . $file->hashName());
                                            })->enableDownload()
                                            ->enableOpen()
                                            ->enableImageRotation()
                                            ->enableImageFlipping()
                                            ->imageResizeTargetWidth('770')
                                            ->imageResizeTargetHeight('399'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('user_img')
                    ->toggleable()
                    ->label('Photo'),

                TextColumn::make('first_name')
                    ->label('Name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('course.title')
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
                SelectFilter::make('course_id')
                    ->relationship('course', 'title')
                    ->label('Filter By Course'),
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
            'index' => Pages\ListAdmissionForms::route('/'),
            'create' => Pages\CreateAdmissionForm::route('/create'),
            'edit' => Pages\EditAdmissionForm::route('/{record}/edit'),
        ];
    }
}
