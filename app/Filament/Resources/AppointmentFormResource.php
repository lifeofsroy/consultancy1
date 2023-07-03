<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\AppointmentForm;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AppointmentFormResource\Pages;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\AppointmentFormResource\RelationManagers;
use App\Filament\Resources\AppointmentFormResource\Pages\CreateAppointmentForm;

class AppointmentFormResource extends Resource
{
    protected static ?string $model = AppointmentForm::class;

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
                                TextInput::make('name')
                                    ->required(),

                                TextInput::make('email')
                                    ->required(),

                                TextInput::make('phone')
                                    ->required(),
                            ]),
                    ]),

                Card::make()
                    ->schema([

                        Grid::make(2)
                            ->schema([
                                Select::make('purpose')
                                    ->required()
                                    ->reactive()
                                    ->options([
                                        'Service' => 'Service',
                                        'Course' => 'Course',
                                        'Institution' => 'Institution',
                                    ]),

                                Select::make('service_id')
                                    ->relationship('service', 'title')
                                    ->label('Service')
                                    ->reactive()
                                    ->hidden(
                                        fn (Closure $get): bool => $get('purpose') != 'Service'
                                    ),

                                Select::make('course_id')
                                    ->relationship('course', 'title')
                                    ->label('Course')
                                    ->reactive()
                                    ->hidden(
                                        fn (Closure $get): bool => $get('purpose') != 'Course'
                                    ),

                                Select::make('institution_id')
                                    ->relationship('institution', 'name')
                                    ->label('Institution')
                                    ->reactive()
                                    ->hidden(
                                        fn (Closure $get): bool => $get('purpose') != 'Institution'
                                    ),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        DateTimePicker::make('datetime')
                            ->required()
                            ->label('Appointment Date & Time')
                            ->withoutSeconds()
                            ->minDate(now())
                            ->displayFormat('F j, Y - g:i a')
                            ->timezone('Asia/Kolkata'),
                    ]),

                Card::make()
                    ->schema([
                        Textarea::make('desc')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('purpose')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('datetime')
                    ->date('M j, Y - g:i a')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->color('success')
                    ->size('sm')
                    ->label('Date & Time'),

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
                SelectFilter::make('purpose')
                    ->options([
                        'Service' => 'Service',
                        'Course' => 'Course',
                        'Institution' => 'Institution',
                    ])
                    ->label('Filter By Purpose'),

                SelectFilter::make('service_id')
                    ->relationship('service', 'title')
                    ->label('Filter By Service'),

                SelectFilter::make('course_id')
                    ->relationship('course', 'title')
                    ->label('Filter By Course'),

                SelectFilter::make('institution_id')
                    ->relationship('institution', 'name')
                    ->label('Filter By Institution'),
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
            'index' => Pages\ListAppointmentForms::route('/'),
            'create' => Pages\CreateAppointmentForm::route('/create'),
            'edit' => Pages\EditAppointmentForm::route('/{record}/edit'),
        ];
    }
}
