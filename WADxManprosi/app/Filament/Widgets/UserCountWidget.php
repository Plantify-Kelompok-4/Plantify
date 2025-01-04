<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class UserCountWidget extends Widget
{
    protected static string $view = 'filament.widgets.user-count-widget';

    public function getUserCount(): int
    {
        return \App\Models\User::count(); // Menghitung jumlah pengguna
    }
} 