<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedrecResource\Pages;
use App\Filament\Resources\MedrecResource\RelationManagers;
use App\Models\Medrec;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class MedrecResource extends Resource
{
    protected static ?string $model = Medrec::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pasien')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('waktu')
                    ->required(),
                Forms\Components\Textarea::make('soap')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('profesi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_terang')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pasien'),
                Tables\Columns\TextColumn::make('waktu')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('soap'),
                Tables\Columns\TextColumn::make('profesi'),
                Tables\Columns\TextColumn::make('nama_terang'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMedrecs::route('/'),
            'view' => Pages\ViewMedrec::route('/{record}'),
        ];
    }    
    
}
