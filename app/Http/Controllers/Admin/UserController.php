<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.user.index', ['users' => $users]);
    }

    public function edit($id)
    {
        return view('Admin.user.edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();

        $user->roles()->detach();
        if ($request['User']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['Provider']) {
            $user->roles()->attach(Role::where('name', 'Provider')->first());
        }
        if ($request['Admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        Session::flash('success', 'Infomations have been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->delete();
        return redirect()->back();
    }
}
