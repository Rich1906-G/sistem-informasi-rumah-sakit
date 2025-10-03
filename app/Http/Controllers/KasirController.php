<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir', ['title' => 'Kasir || Royal Klinik', 'header' => 'Kasir', 'subHeader' => 'Royal Klinik']);
    }
}
