<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Team;
use Auth;
use Response;
use App\User;

class TeamController extends Controller
{
	private $team;
    public function __construct()
    {
    	$this->team = new Team();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        return view('dashboard.team');
    }

    public function create()
    {
    	return view('dashboard.addTeam');
    }

    public function show($id)
    {
        return Contacts::findOrFail($id);
    }

    public function index()
    {
       return $this->team->getTeams();
    }

    public function members($id)
    {
    	return $this->team->getMembers($id);
    }

    public function update(Request $request, $id)
    {
        
    }

    public function remove($id,$teamid)
    {
        $user = User::find($id);
        $user->team()->detach();
        return $id;
    }

    public function store(Request $data)
    {
        return $this->team->stored($data);
    }
}
