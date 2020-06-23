<?php

namespace App\Http\Controllers\Api;

use App\API\ApiError;
use App\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Datasheet;
use App\Http\Controllers\Controller;

// use GuzzleHttp\Client;

class VehiclesController extends Controller
{

    private $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        // $this->middleware('auth'); TIRAR ESTE COMENTÁRIO DEPOIS QUE DESCOBRIR COMO USAR AUTH NA API ************************************************
    }

    public function index()
    {
        $data = ['data' => $this->vehicle->paginate(10)];
        return response()->json($data);
    }

    public function show($uuid)
    {
        $vehicle = $this->vehicle->find($uuid);
        if (!$vehicle) return response()->json(ApiError::errorMessage('veículo não encontrado', 1009), 404);

        $data = ['data' => $vehicle];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $atributes = $this->validateVehicle();

            $atributes['marina_id'] = 1;
            //TODO:  $atributes['marina_id'] = auth()->id();
            $atributes['uuid'] = uuid();
            $atributes['last_run'] = new Carbon('now', 'America/Sao_Paulo');
            $atributes['status'] = 'parked';
            $atributes['belongings'] = $request->input('belongings');
            $atributes['gas_percentage'] = $request->input('gas_percentage');
            $atributes['navigation_hours'] = $request->input('navigation_hours');

            $vehicle = Vehicle::create($atributes);

            $return = ['data' => ['msg' => 'Veículo criado com sucesso!', 'vehicle' => $vehicle]];
            return response()->json($return, 201);
        } catch (\Exception $error) {
            if (config('app.debug')) {
                return response()->json(
                    ApiError::errorMessage($error->getMessage(), 1010),
                    500
                    //TODO: Fazer lista de códigos de erros, aqui eu considero que este erro tem o código fictício = 1010.
                );
            }
            //aqui em baixo, em vez de usar "$error->getMessage()" eu posso criar uma mensagem padrão para aparecer quando o debug estiver desativado.
            return response()->json(ApiError::errorMessage($error->getMessage(), 1010), 500);
        }
    }

    public function update(Request $request, $uuid)
    {
        try {
            $vehicle = $this->vehicle->find($uuid);
            $vehicleId = $vehicle->id;
            $vehicle->belongings = $request->input('belongings');
            $vehicle->gas_percentage = $request->input('gas_percentage');
            $vehicle->navigation_hours = $request->input('navigation_hours');

            $vehicle->update($this->reValidateVehicle($vehicleId));

            $return = ['data' => ['msg' => 'Veículo atualizado com sucesso!', 'vehicle' => $vehicle]];
            return response()->json($return, 201);
        } catch (\Exception $error) {
            if (config('app.debug')) {
                return response()->json(
                    ApiError::errorMessage($error->getMessage(), 1011),
                    500
                    //TODO: Fazer lista de códigos de erros, aqui eu considero que este erro tem o código fictício = 1011.
                );
            }
            //aqui em baixo, em vez de usar "$error->getMessage()" eu posso criar uma mensagem padrão para aparecer quando o debug estiver desativado.
            return response()->json(ApiError::errorMessage($error->getMessage(), 1011), 500);
        }
    }

    public function destroy(Vehicle $uuid)
    {
        try {
            //TODO: $this->authorize('update', $uuid);
            $uuid->delete();
            $uuid->status = 'deleted';
            $uuid->marina_id = 0;
            $uuid->belongings = "";

            $return = ['data' => ['msg' => 'Embarcação ' . $uuid->name . ' apagada!', 'vehicle' => $uuid]];
            return response()->json($return, 200);
        } catch (\Exception $error) {
            if (config('app.debug')) {
                return response()->json(
                    ApiError::errorMessage($error->getMessage(), 1012),
                    500
                    //TODO: Fazer lista de códigos de erros, aqui eu considero que este erro tem o código fictício = 1012.
                );
            }
            //aqui em baixo, em vez de usar "$error->getMessage()" eu posso criar uma mensagem padrão para aparecer quando o debug estiver desativado.
            return response()->json(ApiError::errorMessage($error->getMessage(), 1012), 500);
        }
    }

    public function showDatasheets(Vehicle $vehicle)
    {
        // $this->authorize('update', $vehicle);
        // $datasheets = Datasheet::where('vehicle_id', $vehicle->id);
        // return view('vehicles.datasheet', compact('vehicle', 'datasheets'));
    }

    public function showParked()
    {
        // $vehicles = auth()->user()->vehicles;
        // return view('vehicles.showParked', compact('vehicles'));
    }

    public function showNavigating()
    {
        // $vehicles = auth()->user()->vehicles;
        // return view('vehicles.showNavigating', compact('vehicles'));
    }

    public function showOut()
    {
        // $vehicles = auth()->user()->vehicles;
        // return view('vehicles.showOut', compact('vehicles'));
    }

    public function showDisused()
    {
        // $vehicles = auth()->user()->vehicles;
        // return view('vehicles.showDisused', compact('vehicles'));
    }

    public function generateQr(Request $request, Vehicle $vehicle)
    {
        // return view('vehicles.sticker', compact('vehicle'));
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
            'name' => ['min:2'],
            'owner_name' => ['min:2'],
            'brand' => ['min:3'],
            'model' => ['min:3'],
            'year' => ['min:4'],
            'register_number' => ['min:5', Rule::unique('vehicles')->ignore($vehicleId)],
        ]);
    }
}
