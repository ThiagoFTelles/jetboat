<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use PDF;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atributes = $this->validateVehicle();
        
        $atributes['marina_id'] = auth()->id();
        $atributes['uuid'] = uuid();
        $atributes['last_run'] = new Carbon('now', 'America/Sao_Paulo');
        $atributes['status'] = 'parked';

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
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

    // public function generateQr(Request $request, Vehicle $vehicle)
    // {
    //     // $uuid = $request->input('value');
    //     $uuid = $vehicle->uuid;
    //     $url = "https://qrcode-monkey.p.rapidapi.com/qr/custom";
    //     $body = '"body"=>{
    //         "circle-zebra-vertical",
    //         "eye"=>"frame13",
    //         "eyeBall"=>"ball15",
    //         "erf1"=>[],
    //         "erf2"=>[],
    //         "erf3"=>[],
    //         "brf1"=>[],
    //         "brf2"=>[],
    //         "brf3"=>[],
    //         "bodyColor"=>"#0277BD",
    //         "bgColor"=>"#FFFFFF",
    //         "eye1Color"=>"#075685",
    //         "eye2Color"=>"#075685",
    //         "eye3Color"=>"#075685",
    //         "eyeBall1Color"=>"#0277BD",
    //         "eyeBall2Color"=>"#0277BD",
    //         "eyeBall3Color"=>"#0277BD",
    //         "gradientColor1"=>"#075685",
    //         "gradientColor2"=>"#0277BD",
    //         "gradientType"=>"linear",
    //         "gradientOnEyes"=>false,
    //         "logo"=>"#facebook"
    //         }';

    //     $client = new \GuzzleHttp\Client(['headers' => ['X-RapidAPI-Key' => '53082871a8msh667b4ed9682a270p195055jsn8db63f912e01'], ['Content-Type' => 'application/json']]);
    //     $request = $client->post($url, 
    //             ['json' => [
    //                 "data" =>"https://www.qrcode-monkey.com",
    //                 "config"=>$body,
    //                 "size"=>1000,
    //                 "download"=>true,
    //                 "file"=>"png"
    //             ]]);

    //     // $myBody['name'] = "Demo";
    //     // $request = $client->post($url,  ['body'=>$myBody]);
    //     $response = $request->send();

    //     dd($response);
    // }

    // public function generateQr(Request $request, Vehicle $vehicle)
    // {
    //     // $uuid = $request->input('value');
    //     // $uuid = $vehicle->uuid;
    //     return view('vehicles.vehicleqr', compact('vehicle'));
    // }
    public function generateQr(Request $request, Vehicle $vehicle)
    {
        return view('vehicles.sticker', compact('vehicle'));
    }

    public function generatePDF(Vehicle $vehicle)
    {
        $name = $vehicle->owner_name.".pdf";
        $pdf = PDF::loadView('vehicles.sticker', compact('vehicle'));
  
        return $pdf->download($name);
    }

    public function action(Request $request, Vehicle $vehicle) 
    {
        //$this->authorize('update', $vehicle); //acessado apenas pela Marina dona da embarcação, sem QR code
        
        $vehicle->status = $request->input('action');
        $vehicle->marina_id = auth()->user()->id;

        switch ($request->get('action')) {
            case 'deleted':
                $vehicle->marina_id = null;
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

        if($vehicle->marina_id === null){$vehicle->marina_id = auth()->user()->id;}

        $vehicle->update();
        flash('Embarcação '.$vehicle->name.' atualizada.');
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
        $vehicle->update($this->reValidateVehicle($vehicleId));
        flash('Embarcação '.$vehicle->name.' atualizada.');
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
            'name' => ['required', 'min:2', 'unique:vehicles'],
            'owner_name'=> ['required', 'min:2'],
            'brand'=> ['min:3'],
            'model'=> ['min:3'],
            'year'=> ['min:4'],
            'register_number'=> ['required', 'min:5', 'unique:vehicles'],
        ]);
    }

    protected function reValidateVehicle($vehicleId)
    {
        return request()->validate([
            'name' => ['required', 'min:2', Rule::unique('vehicles')->ignore($vehicleId)],
            'owner_name'=> ['required', 'min:2'],
            'brand'=> ['min:3'],
            'model'=> ['min:3'],
            'year'=> ['min:4'],
            'register_number'=> ['required', 'min:5', Rule::unique('vehicles')->ignore($vehicleId)],
        ]);
    }
}
