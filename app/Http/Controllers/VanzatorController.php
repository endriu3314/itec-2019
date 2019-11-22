<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VanzatorController extends Controller
{
    //views
    public function index()
    {
        return view('vanzator.home');
    }
}
