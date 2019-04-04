<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\CountValidator\CountValidatorAbstract;

class MarinasController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');        
    }
    
    public function index()
    {
        $marina_name = strtoupper(auth()->user()->name);

        $vehicles = auth()->user()->vehicles;

        $disusedVehiclesAmount = $vehicles->filter->isDisused()->count();

        $parkedVehiclesAmount = $vehicles->where('status','parked')->count();
        $outingsVehiclesAmount = $vehicles->where('status','out')->count();
        $navigatingVehiclesAmount = $vehicles->where('status','navigating')->count();

        $totalVehiclesAmount = $vehicles->count();

        return view('marinas.index', ['parkedVehiclesAmount' => $parkedVehiclesAmount,
         'disusedVehiclesAmount' => $disusedVehiclesAmount, 
         'totalVehiclesAmount' => $totalVehiclesAmount,
         'marina_name' => $marina_name,
         'outingsVehiclesAmount' => $outingsVehiclesAmount,
         'navigatingVehiclesAmount' => $navigatingVehiclesAmount,
         ]);

    }
}
