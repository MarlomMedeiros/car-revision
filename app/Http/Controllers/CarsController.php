<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarsController extends Controller
{
    public function index()
    {
        return Inertia::render('Cars/Index' , [
            'vehicles' => Vehicle::all()
        ]);
    }
}
