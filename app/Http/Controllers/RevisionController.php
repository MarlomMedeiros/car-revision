<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RevisionController extends Controller
{
    public function index(Vehicle $vehicle)
    {
        return inertia('Owners/Vehicles/Revisions/Index', [
            'vehicle' => $vehicle->load('revisions')->load('owner'),
        ]);
    }

    public function destroy(Request $request)
    {
        $revisionId = $request->route('revision');

        $revision = Revision::findOrFail($revisionId);

        $revision->delete();
    }

    public function edit(Request $request)
    {
        $revisionId = $request->route('revision');

        return inertia('Owners/Vehicles/Revisions/Edit', [
            'revision' => Revision::findOrFail($revisionId)->load('vehicle.owner'),
        ]);
    }

    public function update(Request $request)
    {
        $ownerId = $request->route('owner');

        $vehicleId = $request->route('vehicle');

        $this->validate($request, [
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);

        Revision::findOrFail($request->route('revision'))->update($request->all());

        return to_route('vehicles.show', ['owner' => $ownerId, 'vehicle' => $vehicleId]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Owners/Vehicles/Revisions/Create', [
            'vehicle' => $request->all(),
        ]);
    }

    public function store(Request $request)
    {
        $ownerId = $request->route('owner');
        $vehicleId = $request->route('vehicle');

        $this->validate($request, [
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);

        Revision::create($request->all());

        return to_route('vehicles.show', ['owner' => $ownerId, 'vehicle' => $vehicleId]);
    }

    public function show(Request $request)
    {
        $revisionId = $request->route('revision');

        $vehicle = Revision::findOrFail($revisionId)->load('vehicle.owner');

        return inertia('Owners/Vehicles/Revisions/Show', [
            'revision' => $vehicle,
        ]);
    }
}
