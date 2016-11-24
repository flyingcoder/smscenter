<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Twilio;
use App\Child;



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

    public function send($number, $message)
    {
        try 
        { 
            $m = Twilio::message($number, $message);

        } catch(Services_Twilio_RestException $e) {

            return $e;
        };

        return $m;
    }

    public function sendBulk(Request $request)
    {
        if($request->has('child')){
            foreach ($request->child as $key => $value) {
                $child = Child::find($value);
                $this->send($child->phone_number, $request->message);
            }
        }

        return redirect()->back()->with('message', 'All message has been send!');
    }

    public function getSmsLogs()
    {
        
    }
}
