<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function index(Vehicle $vehicles)
    {
        return inertia('Vehicles/Index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function destroy(Request $request)
    {
        $vehicleId = $request->route('vehicle');

        $vehicle = Vehicle::findOrFail($vehicleId);

        $vehicle->delete();
    }

    public function edit(Request $request)
    {
        $vehicleId = $request->route('vehicle');

        return Inertia::render('Owners/Vehicles/Edit', [
            'vehicle' => Vehicle::findOrFail($vehicleId),
        ]);
    }

    public function update(Request $request)
    {
        $vehicleId = $request->route('vehicle');

        $vehicle = Vehicle::findOrFail($vehicleId);

        $this->validate($request, [
            'brand' => 'required|max:255',
            'model' => 'required',
            'plate' => 'required|unique:vehicles,plate,'.$vehicle->id,
            'year' => 'required|numeric|min:1900|max:'.(date('Y')+1),
        ]);

        $vehicle->update($request->all());

        return to_route('owners.show', $vehicle->owner_id);
    }

    public function create(Owner $owner)
    {
        return Inertia::render('Owners/Vehicles/Create', [
            'owner' => $owner,
        ]);
    }

    public function show(Request $request)
    {
        $vehicleId = $request->route('vehicle');

        return Inertia::render('Owners/Vehicles/Show', [
            'vehicle' => Vehicle::findOrFail($vehicleId)->load('revisions')->load('owner'),
        ]);
    }

    public function store(Request $request)
    {
        $ownerId = $request->route('owner');

        $this->validate($request, [
            'owner_id' => 'required|exists:owners,id',
            'brand' => 'required|max:255',
            'model' => 'required',
            'plate' => 'required|unique:vehicles,plate',
            'year' => 'required|numeric|min:1900|max:'.(date('Y')+1),
        ]);

        Vehicle::create($request->all());

        return to_route('owners.show', $ownerId);
    }
}
