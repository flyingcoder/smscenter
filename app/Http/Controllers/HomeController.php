<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Schedule;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.home');
    }

    public function schedule()
    {
        $records = Schedule::orderBy('created_at', 'desc')->paginate(10);
        foreach ($records as $key => $value) {
            $vaccine_id = DB::table('child_vaccine')->select('vaccine_id')->where('id', $value->pivot_id)->first()->vaccine_id;
            $value->vaccine_id = $vaccine_id;
        }
        return view('pages.reports', compact('records'));
    }
}
