<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Vehicle;
use Carbon\Carbon;

class ActivityLogController extends Controller
{
    // public function index(Activity $activity)
    public function index(Request $request)
    {   
        $di = $request->input('di');
        $df = $request->input('df');    

        if ($di) {
            
            $marinaActions = Auth::user()->actions->where('created_at', '>=', $di);
            $marinaActions = $marinaActions->where('created_at', '<', $df);
            
            return view('marinas.reportrange', compact('marinaActions', 'di', 'df'));
        }
             
        return view('marinas.report');
    }
    
}
