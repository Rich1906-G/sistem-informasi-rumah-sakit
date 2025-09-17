<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PKSController extends Controller
{
    public function index()
    {
        return view('pks');
    }
}
