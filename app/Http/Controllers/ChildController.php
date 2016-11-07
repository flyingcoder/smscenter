<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChildController extends Controller
{
    public function create()
    {
    	return view('dashboard.register-child');
    }
}
