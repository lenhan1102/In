<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('Provider.menu.menu_index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        Menu::create([
            'name' => $request->name
        ]);
        return view('Provider.menu.menu_index');
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
            'name' => 'required|unique:menus|max:64',
            ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->save();
        return redirect()->route('menu.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Provider.menu.menu_edit', ['id' => $id]);
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
        $this->validate($request, [
            'name' => 'required|unique:menus|max:64',
            ]);
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->save();

        Session::flash('success', 'Updated successfully!');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        Session::flash('success', 'Deleted!');
        return redirect()->route('menu.index'); 
    }

    public function AJAXMlist(Request $request){
        $menu = $request->input('menu');
        $html = "<table class='mdl-data-table mdl-js-data-table mdl-shadow--8dp'><tr><th>Id</th><th>Name</th></tr>";
        if ($menu == "All") {
            # code...
            $mlists = Mlist::all();
        } else {
            $mlists = Menu::where('name', $menu)->first()->mlists;
        }
        foreach ($mlists as $mlist) {
            # code...
            $html .= '<tr><td>'.$mlist->id.'</td>
            <td>'.$mlist->name.'</td>
            <td><a href="'.route('mlist.edit', ['id' => $mlist->id]).'">Edit</a></td>
            <td><a href="'.route('mlist.destroy', ['id' => $mlist->id]).'">Delete</a></td></tr>';
        }
        $html .= "</table>";
        return $html;
    }
}
