<?php

namespace App\Filament\Resources\BerandaResource\Widgets;

use Filament\Widgets\Widget;

class Beranda extends Widget
{
    protected static string $view = 'filament.resources.beranda-resource.widgets.beranda';
    protected function getColumns(): int | array
{
    return 12;
}
}
