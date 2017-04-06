<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use App\MList;

class MlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mlists = Mlist::all();
        $menus = Menu::all();
        return view('admin.mlist.index', ['menus' => $menus, 'mlists' => $mlists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Hien thi cac Menu, cac danh sach da co va input ten danh sach
        $menus = Menu::all();
        $mlist = MList::all();
        return view('Admin.mlist.create', ['menus' => $menus, '$mlist' => $mlist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:mlists|max:255',
            'menu_id' => 'required'
        ]);
        $mlist = new MList();
        $mlist->name = $request->input('name');
        $mlist->menu_id = $request->input('menu_id');
        $mlist->save();

        return redirect()->route('mlist.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view with Mlist::find($id)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dropdown list menu va textfield ten list
        $mlist = MList::find($id);
        $menus = Menu::all();
        // Lay menu hien tai
        $cur_menu = $mlist->menu;

        return view('Admin.mlist.edit', ['id' => $id, 'mlist' => $mlist, 'menus' => $menus, 'cur_menu' => $cur_menu]);
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
        $this->validate($request, [
            'name' => 'required|unique:mlists|max:255',
            'menu_id' => 'required'
        ]);
        $mlist = Mlist::find($id);
        $mlist->update(['name' => $request->input('name'), 'menu_id' => $request->input('menu_id')]);

        return redirect()->route('mlist.index');
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
        $mlist = Mlist::find($id);
        $mlist->delete();

        return redirect()->route('mlist.index'); 
    }

    public function AJAXMlist(Request $request){
        $menu = $request->input('menu');
        $html = "<table class='mdl-data-table mdl-js-data-table'><tr><th>Id</th><th>Name</th></tr>";
        if ($menu == "") {
            # code...
            $mlists = Mlist::all();
        } else {
            $mlists = Menu::find($menu)->mlists;
        }
        foreach ($mlists as $mlist) {
            # code...
            $html .= "<tr><td>". $mlist->id ."</td><td>". $mlist->name. "</td></tr>";
        }
        $html .= "</table>";
        return $html;
    }
}
