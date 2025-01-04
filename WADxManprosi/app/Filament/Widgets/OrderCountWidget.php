<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Checkout; // Import model Checkout

class OrderCountWidget extends Widget
{
    protected static string $view = 'filament.widgets.order-count-widget';

    public function getOrderCount(): int
    {
        return Checkout::count(); // Menghitung jumlah pemesanan dari tabel checkouts
    }
} 