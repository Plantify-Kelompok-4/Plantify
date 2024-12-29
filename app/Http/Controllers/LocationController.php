<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        $location = $request->locationId ? Location::find($request->locationId) : new Location;
        $location->name = $request->locationName;
        $location->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $location = Location::find($id);
        if ($location) {
            $location->delete();
        }

        return redirect()->back();
    }
    
    public function showLocations()
{
    $locations = Location::all(); // Assuming Location is the model you're using
    return view('locations.index', compact('locations'));
}

public function show($id)
{
    $location = Location::findOrFail($id);
    return view('locations.show', compact('location'));
}
}