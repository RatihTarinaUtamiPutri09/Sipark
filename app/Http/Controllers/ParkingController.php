<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ParkingController extends Controller
{
    
    public function index()
    {
        $parkings = Parking::with('vehicle')->get();
        return view('parkings.index', compact('parkings'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('parkings.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'check_in' => 'required|date',
        ]);

        Parking::create($request->all());
        return redirect()->route('parkings.index')->with('success', 'Parking record created successfully.');
    }

    public function edit(Parking $parking)
    {
        $vehicles = Vehicle::all();
        return view('parkings.edit', compact('parking', 'vehicles'));
    }

    public function update(Request $request, Parking $parking)
    {
        $request->validate([
            'check_out' => 'required|date|after_or_equal:' . $parking->check_in,
        ]);
    
        $checkIn = Carbon::parse($parking->check_in);
        $checkOut = Carbon::parse($request->check_out);
    
        $duration = ceil($checkIn->diffInMinutes($checkOut) / 60); // bulat ke atas
        $rate = 5000; // tarif per jam
        $amount = $duration * $rate;
    
        $parking->check_out = $checkOut;
        $parking->amount = $amount;
        $parking->save();
    
        return redirect()->route('parkings.index')->with('success', 'Parking record updated successfully.');
    }

    public function destroy(Parking $parking)
    {
        $parking->delete();
        return redirect()->route('parkings.index')->with('success', 'Parking record deleted successfully.');
    }
}
