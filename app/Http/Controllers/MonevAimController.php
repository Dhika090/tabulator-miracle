<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonevAimController extends Controller
{
    public function index()
    {
        return view('monev-aim');
    }
}
