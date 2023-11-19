<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarsController extends Controller
{
    public function index()
    {
        return inertia('Cars/Index', [
            'vehicles' => Vehicle::with('owner')->get(),
        ]);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
    }

    public function edit(Vehicle $vehicle)
    {
        return Inertia::render('Cars/Edit', [
            'vehicle' => $vehicle->load('owner'),
        ]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $this->validate($request, [
            'brand' => 'required|max:255',
            'model' => 'required',
            'plate' => 'required|unique:vehicles,plate,'.$vehicle->id,
            'year' => 'required|numeric|min:1900|max:'.(date('Y')+1),
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index');
    }

    public function create()
    {
        return Inertia::render('Cars/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_id' => 'required|exists:owners,id',
            'brand' => 'required|max:255',
            'model' => 'required',
            'plate' => 'required|unique:vehicles,plate',
            'year' => 'required|numeric|min:1900|max:'.(date('Y')+1),
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index');
    }
}
