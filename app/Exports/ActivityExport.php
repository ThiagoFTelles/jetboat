<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ActivityExport implements FromView
{
    public $di;
    public $df;


    public function __construct($di, $df = "")
    {
        $this->di = $di;
        $this->df = $df;
    }

    public function view(): View
    {
        $di = $this->di;
        $df = $this->df;
        $marinaActions = Auth::user()->actions->where('created_at', '>=', $di);
        $marinaActions = $marinaActions->where('created_at', '<', $df);
        return view('marinas.export-reportrange', compact('marinaActions', 'di', 'df'));
    }
}
