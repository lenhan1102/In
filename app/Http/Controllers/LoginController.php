<?php


namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
	public function login(Request $request){
		$user = array('username' => Request::input('username'),
					  'password' => Request::input('password'));
		
		return view('index', ['user' => $user]);
	}
}