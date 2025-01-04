<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showConsultation()
    {
        return view('consultation'); // Mengarahkan ke view consultation.blade.php
    }

    public function showHome()
    {
        return view('home'); // Mengarahkan ke view consultation.blade.php
    }

    public function showMonitoring()
    {
        $locations = Location::all();
        return view('monitoring', compact('locations'));
    }
}

