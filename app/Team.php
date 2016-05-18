<?php

namespace App;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teamname', 'email', 'description'
    ];

    public function members()
    {
    	return $this->belongsToMany('App\User', 'team_users', 'team_id', 'user_id');
    }

    public function getTeams()
    {
    	$teamid = DB::table('team_users')
       	->select('team_id')
       	->where('user_id', Auth::user()->id)
       	->get();

       $team = [];

       foreach($teamid as $key => $id){
       		$team[$id->team_id] = DB::table('teams')->select('teamname')->where('id', $id->team_id)->get()[0]->teamname;
       	}

       $data = ['size' => count($teamid), 'content' => $team];
       if(count($teamid)==1){
        $data['id'] = $teamid[0]->team_id;
       }
       return $data;
    }

    public function getMembers($id)
    {
    	$userid = DB::table('team_users')
    		->select('user_id','role')
    		->where('team_id', $id)
    		->get();

    	$users = [];

       foreach($userid as $key => $id){
       		$member = DB::table('users')->select('id','email','name', 'phone')->where('id', $id->user_id)->get()[0];
       		$member->role = $id->role;
       		$users[] = $member;
       	}

       return json_encode($users);
    }

    public function stored(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'teamname' => 'required|unique:teams'
        ]);

        if ($validator->fails()) {
            return Response::make($validator->errors()->all(),500);
        } 
        
		$team = Team::create($data->all());

		DB::beginTransaction();
		try 
		{
			DB::table('team_users')->insert([
				'user_id' => Auth::user()->id,
				'team_id' => $team->id,
				'role' => 'admin'
			]);
			DB::commit();
			return $team;
		} catch (\Exception $e) {
		    DB::rollback();
		    return $e;
		}
		
    }

    
}
