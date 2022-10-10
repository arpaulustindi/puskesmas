<?php

namespace App\Filament\Resources\MedrecResource\Pages;

use App\Filament\Resources\MedrecResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMedrecs extends ManageRecords
{
    protected static string $resource = MedrecResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
