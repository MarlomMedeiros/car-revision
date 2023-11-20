<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return inertia('Owners/Index', [
            'owners' => Owner::all()->load('vehicles'),
        ]);
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
    }

    public function edit(Owner $owner)
    {
        return inertia('Owners/Edit', [
            'owner' => $owner,
        ]);
    }

    public function update(Request $request, Owner $owner)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'document' => 'required|unique:owners,document,' . $owner->id,
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'email' => 'required|email|unique:owners,email,' . $owner->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $owner->update($request->all());

        return redirect()->route('owners.index');
    }

    public function create()
    {
        return inertia('Owners/Create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'document' => 'required|unique:owners,document',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Owner::create($request->all());

        return redirect()->route('owners.index');
    }

    public function show(Owner $owner)
    {
        return inertia('Owners/Show', [
            'owner' => $owner->load('vehicles'),
        ]);
    }
}
