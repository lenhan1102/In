<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
		/*
		echo 'name: '.$request->name.' ';
		echo 'gender:'.$request->gender.' ';
		echo 'birthday:'.$request->birthday.' ';
		
		echo 'username: '.$request->username_regis.' ';
		echo 'pass: '.$request->password_regis.' ';
		echo 're: '.$request->repassword_regis.' ';
		*/
        //
		
		/*
		$this->validate($request, [
			'username_regis' => 'required|unique:users,name|max:25',
			'name' => 'required',
			'email' => 'required',
			'password_regis' => 'required',
			'password_regis' => 'same:repassword_regis',
		]);
		*/
		$new_user = new User;
		
        $new_user->username = $request->username_regis;
		$new_user->password = $request->password_regis;
		$new_user->email = $request->email;
		
		$new_user->name = $request->name;
		$new_user->birthday = $request->birthday;
		
		$new_user->save();
		
		/*
		$new_user->username = 'a';
		$new_user->password = 'a';
		$new_user->name = 'a';
		$new_user->gender = 'Male';
		$new_user->email = 'aaa';
		//$new_user->birthday = $request->birthday;
        $new_user->save();
		*/
		return view('index', ['user' => $new_user]);
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
