<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->disabled()
                    ->maxLength(255)
                    ->label('ID DIbuat Otomatis'),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255)
                    ->label('Nomor Induk Kependudukan (KTP)'),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama'),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Radio::make('gender')
                    ->required()
                    ->options([
                        'Laki-Laki' => 'Laki-Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required()
                    ->label('Gender'),
                Select::make('agama')
                    ->required()
                    ->options([
                        'Kristen' => 'Kristen',
                        'Katholik' => 'Katholik',
                        'Islam' => 'Islam',
                        'Hindu' => 'Hindu',
                        'Budha' => 'Budha',
                        'Konghucu' => 'Konghucu',
                        'Aliran Kepercayaan' => 'Aliran Kepercayaan',
                    ])
                    ->label('Agama'),
                Radio::make('perkawinan')
                    ->required()
                    ->options([
                        'Kawin' => 'Kawin',
                        'Belum Kawin' => 'Belum Kawin',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required()
                    ->label('Perkawinan'),
                Select::make('pekerjaan')
                    ->required()
                    ->options([
                        'ASN' => 'ASN',
                        'Petani' => 'Petani',
                        'Nelayan' => 'Nelayan',
                        'Swasat' => 'Swasat',
                        'Wiraswasta' => 'Wiraswasta',
                        'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa',
                        'TNI/Polri' => 'TNI/Polri',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->label('Pekerjaan'),
                Forms\Components\TextInput::make('hp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(255),
                Select::make('faskes')
                    ->required()
                    ->options([
                        'Tidak Ada/Bayar Sendiri' => 'Tidak Ada/Bayar Sendiri',
                        'JKN/KIS' => 'JKN/KIS',
                        'Jamkesda' => 'Jamkesda',
                        'Askes' => 'Askes',
                        'BPJS Mandiri' => 'BPJS Mandiri',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->label('Faskes'),
                Forms\Components\TextInput::make('nomor_faskes')
                    ->maxLength(255)
                    ->label('Nomor Faskes (Apabila Ada)'),
                Forms\Components\TextInput::make('kk')
                    ->maxLength(255)
                    ->label('Nama Kepala Keluarga'),
                Forms\Components\TextInput::make('kk_alamat')
                    ->maxLength(255)
                    ->label('Alamat Kepala Keluarga'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('nik')->label('NIK'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('agama'),
                Tables\Columns\TextColumn::make('perkawinan'),
                Tables\Columns\TextColumn::make('pekerjaan'),
                Tables\Columns\TextColumn::make('hp'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('faskes'),
                Tables\Columns\TextColumn::make('nomor_faskes'),
                Tables\Columns\TextColumn::make('kk'),
                Tables\Columns\TextColumn::make('kk_alamat'),
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
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\MedrecsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasiens::route('/'),
            'create' => Pages\CreatePasien::route('/create'),
            'view' => Pages\ViewPasien::route('/{record}'),
            'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }


}
