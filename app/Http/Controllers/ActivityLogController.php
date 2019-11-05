<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivityExport;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {   
        $di = $request->input('di');
        $df = $request->input('df');    
        $vehicles = auth()->user()->vehicles;

        if ($di) {
            
            $marinaActions = Auth::user()->actions->where('created_at', '>=', $di);
            $marinaActions = $marinaActions->where('created_at', '<', $df);
            
            return view('marinas.reportrange', compact('marinaActions', 'di', 'df', 'vehicles'));
        }
             
        return view('marinas.report');
    }

    public function exportReport(Request $request) 
    {   
        $di = $request->input('di');
        $df = $request->input('df');    

        return  Excel::download(new ActivityExport($di, $df), 'marinawave.xlsx');
    }
    
}
