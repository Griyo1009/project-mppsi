<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function homepage()
    {
        return view('warga.homepage');
    }
}
