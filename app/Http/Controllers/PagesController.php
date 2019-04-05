<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('marinas.index', compact('vehicle'));
        // return view('welcome');
    }
}
