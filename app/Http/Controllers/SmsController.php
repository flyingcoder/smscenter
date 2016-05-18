<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Twilio;



class SmsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function sendSms(Request $request)
    {
    	
      	try 
	    	{ 
			    $m = Twilio::message($request->phone, $request->body);

			} catch(Services_Twilio_RestException $e) {

			    return $e;
			};

		return $m;
		   
    }
}
