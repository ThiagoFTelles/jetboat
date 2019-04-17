<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;


class ActivityLogController extends Controller
{
    // public function showReport(Activity $activity)
    public function showReport()
    {
        $activities = Activity::with('subject', 'causer')->paginate(15);   

        return view('marinas.report', compact('vehicles'));
    }
    
}
