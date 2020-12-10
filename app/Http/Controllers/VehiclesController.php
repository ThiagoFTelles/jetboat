<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use PDF;
use Spatie\Activitylog\Models\Activity;
use App\Datasheet;

// use GuzzleHttp\Client;

class VehiclesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $vehicles = auth()->user()->vehicles;

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $atributes = $this->validateVehicle();

        $atributes['marina_id'] = auth()->id();
        $atributes['uuid'] = uuid();
        $atributes['last_run'] = new Carbon('now', 'America/Sao_Paulo');
        $atributes['status'] = 'parked';

        $atributes['belongings'] = $request->input('belongings');
        $atributes['gas_percentage'] = $request->input('gas_percentage');
        $atributes['navigation_hours'] = $request->input('navigation_hours');

        $vehicle = Vehicle::create($atributes);

        flash('Sua embarcação foi cadastrada.');

        return redirect('/vehicles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);

        return view('vehicles.show', compact('vehicle'));
    }

    public function showDatasheets(Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);
        $datasheets = Datasheet::where('vehicle_id', $vehicle->id);
        return view('vehicles.datasheet', compact('vehicle', 'datasheets'));
    }

    public function showParked()
    {
        $vehicles = auth()->user()->vehicles;
        return view('vehicles.showParked', compact('vehicles'));
    }

    public function showNavigating()
    {
        $vehicles = auth()->user()->vehicles;
        return view('vehicles.showNavigating', compact('vehicles'));
    }

    public function showOut()
    {
        $vehicles = auth()->user()->vehicles;
        return view('vehicles.showOut', compact('vehicles'));
    }

    public function showDisused()
    {
        $vehicles = auth()->user()->vehicles;
        return view('vehicles.showDisused', compact('vehicles'));
    }

    public function edit(Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);

        return view('vehicles.edit', compact('vehicle'));
    }

    public function actionMenu(Vehicle $vehicle)
    {
        //$this->authorize('update', $vehicle); //acessado apenas pela Marina dona da embarcação, sem QR code
        return view('vehicles.actionMenu', compact('vehicle'));
    }

    public function generateQr(Request $request, Vehicle $vehicle)
    {
        return view('vehicles.sticker', compact('vehicle'));
    }

    public function generatePDF(Vehicle $vehicle)
    {
        $name = $vehicle->owner_name;
        $file = $name . '.pdf';

        $pdf = \PDF::loadView('vehicles.pdf', compact('vehicle'))
            ->setPaper([0, 0, 198.425, 198.425], 'landscape')->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif']); // 198.425 points = 7cm
        return $pdf->download($file);
    }

    public function generateMiniPDF(Vehicle $vehicle)
    {
        $name = substr($vehicle->owner_name, 0, 10);
        $file = $name . '.pdf';

        $pdf = \PDF::loadView('vehicles.mini-pdf', compact('vehicle'))
            ->setPaper([0, 0, 65, 49], 'landscape')->setOptions(['dpi' => 600, 'defaultFont' => 'sans-serif']); // 56.6929 points = 2cm
        return $pdf->download($file);
    }

    public function action(Request $request, Vehicle $vehicle)
    {
        //$this->authorize('update', $vehicle); //acessado apenas pela Marina dona da embarcação, sem QR code

        $vehicle->status = $request->input('action');
        $vehicle->belongings = $request->input('belongings');
        $vehicle->gas_percentage = $request->input('gas_percentage');
        $vehicle->navigation_hours = $request->input('navigation_hours');
        $vehicle->destination = $request->input('destination');
        $vehicle->marina_id = auth()->user()->id;

        switch ($request->get('action')) {
            case 'deleted':
                $vehicle->marina_id = 0;
                break;
            case 'run':
                $vehicle->last_run = now();
                $vehicle->status = 'parked';
                break;
            case 'navigating':
                $vehicle->last_run = now();
                break;
            case 'parked':
                $vehicle->last_run = now();
                break;
        }

        if ($vehicle->marina_id === null) {
            $vehicle->marina_id = auth()->user()->id;
        }

        $vehicle->update();
        flash('Embarcação ' . $vehicle->name . ' atualizada.');
        return redirect('/marina');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicleId = $vehicle->id;

        $vehicle->belongings = $request->input('belongings');
        $vehicle->gas_percentage = $request->input('gas_percentage');
        $vehicle->navigation_hours = $request->input('navigation_hours');
        $vehicle->destination = $request->input('destination');

        $vehicle->update($this->reValidateVehicle($vehicleId));
        flash('Embarcação ' . $vehicle->name . ' atualizada.');
        return redirect('/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);
        $vehicle->delete();
        flash('Embarcação apagada.');
        return redirect('/vehicles');
    }

    protected function validateVehicle()
    {
        return request()->validate([
            'name' => ['required', 'min:2'],
            'owner_name' => ['required', 'min:2'],
            'brand' => ['min:3'],
            'model' => ['min:3'],
            'year' => ['min:4'],
            'register_number' => ['required', 'min:5', 'unique:vehicles'],
        ]);
    }

    protected function reValidateVehicle($vehicleId)
    {
        return request()->validate([
            'name' => ['required', 'min:2'],
            'owner_name' => ['required', 'min:2'],
            'brand' => ['min:3'],
            'model' => ['min:3'],
            'year' => ['min:4'],
            'register_number' => ['required', 'min:5', Rule::unique('vehicles')->ignore($vehicleId)],
        ]);
    }
}
