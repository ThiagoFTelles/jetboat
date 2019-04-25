<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Vehicle;

class ActivityLogController extends Controller
{
    // public function index(Activity $activity)
    public function index()
    {
        $marinaActions = Auth::user()->actions;   
        // foreach ($marinaActions as $action) {
        //     $uuid = $action->subject_id;
        //     $vehicle = Vehicle::find($uuid);
        //     $status = $vehicle->status;
        //     return dd($status);
        // }
        // return dd($marinaActions);

        return view('marinas.report', compact('marinaActions'));
    }
    
}
