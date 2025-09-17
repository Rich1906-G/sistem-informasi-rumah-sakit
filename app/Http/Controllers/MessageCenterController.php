<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageCenterController extends Controller
{
    public function index()
    {
        return view('message_center');
    }
}
