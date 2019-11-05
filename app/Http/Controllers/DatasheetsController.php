<?php

namespace App\Http\Controllers;

use App\Datasheets;
use Illuminate\Http\Request;
use App\Vehicle;

class DatasheetsController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');        
    }
    
    public function index(Vehicle $vehicle, Datasheets $datasheets)
    {
        return view('vehicles.datasheet', compact('vehicle', 'datasheets'));
    }
    
    
    public function create()
    {
        //
    }
    public function store(Request $request, Vehicle $vehicle)
    {
        $atributes = $this->validateDatasheet();
        
        $atributes['vehicle_id'] = $vehicle->id();
        $vehicle = Datasheets::create($atributes);
        
        flash('Ficha técnica atualizada.');
        
        return redirect('/marina');
    }
    
    protected function validateDatasheet()
    {
        return request()->validate([
            'maintenance_description' => ['min:5'],
            'vehicle_id'=> ['required'],
            'repair_description'=> ['min:5'],
            'repair_professional'=> ['min:3'],
            'repair_professional_contact'=> ['min:4'],
        ]);
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Datasheet  $datasheet
     * @return \Illuminate\Http\Response
     */
    public function show(Datasheet $datasheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datasheet  $datasheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Datasheet $datasheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datasheet  $datasheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datasheet $datasheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datasheet  $datasheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datasheet $datasheet)
    {
        //
    }

}
