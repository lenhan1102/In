<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;
use App\Role;
use Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manage', new User)) {
            return response('Insufficient permissions', 401);
        }
        $users = User::all();
        return view('Admin.user.user_index', ['users' => $users]);
    }

    public function edit($id)
    {
        if (Gate::denies('manage', new User)) {
            return response('Insufficient permissions', 401);
        }
        return view('Admin.user.user_edit', ['user' => User::find($id)]);
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
        if (Gate::denies('manage', new User)) {
            return response('Insufficient permissions', 401);
        }
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
        if (Gate::denies('manage', new User)) {
            return response('Insufficient permissions', 401);
        }
        if ($request->id == Auth::user('id')) {
            Session::flash('success', 'Your action is invalid');
        } else {
            $user = User::find($request->input('id'));
            $user->delete();
        }
        return redirect()->back();
    }
}
