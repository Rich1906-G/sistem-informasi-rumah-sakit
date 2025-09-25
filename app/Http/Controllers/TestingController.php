<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function Testing(Request $request){
        return $request;
    }

    public function HalamanTesting(){
        return view('testing');
    }
}
