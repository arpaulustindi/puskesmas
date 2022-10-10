<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedrecsRelationManager extends RelationManager
{
    protected static string $relationship = 'medrecs';

    protected static ?string $recordTitleAttribute = 'medrec';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
