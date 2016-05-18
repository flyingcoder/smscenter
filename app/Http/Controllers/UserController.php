<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Firebase\JWT\JWT;
use App\User;
use DB;
use Response;

class UserController extends Controller {

    /**
     * Generate JSON Web Token.
     */
    protected function createToken($user)
    {
        $payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + (2 * 7 * 24 * 60 * 60)
        ];
        return JWT::encode($payload, Config::get('app.token_secret'));
    }

    /**
     * Get signed in user's profile.
     */
    public function getUser(Request $request)
    {
        $user = User::find($request['user']['sub']);

        return $user;
    }

    /**
     * Update signed in user's profile.
     */
    public function updateUser(Request $request)
    {
        $user = User::find($request['user']['sub']);

        $user->displayName = $request->input('displayName');
        $user->email = $request->input('email');
        $user->save();

        $token = $this->createToken($user);

        return response()->json(['token' => $token]);
    }

    public function newMember(Request $request)
    {
        $userid = DB::table('users')->select('id')->where('email', $request->email)->get()[0]->id;
        $user = User::find($userid);
        $user->team()->attach($request->teamid, ['role' => 'member']);
        return $request->all();
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        return Response::json($request->all());
    }

    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

     public function destroy($id)
    {
        return User::destroy($id);
    }
}
