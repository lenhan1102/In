<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use App\MList;
use App\Menu;
use App\Image;

class DishController extends Controller
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
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required|unique:dishes|max:255',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'list' => 'required',
            'menu' => 'required',
            ]);
        $dish = new Dish(array(
          'name' => $request->get('name'),
          'price'  => $request->get('price'),
          'description' => $request->get('description'),
        ));
        // Associate to Menu List
        $menu = Menu::find($request->get('menu'));
        $list = MList::find($request->get('list'));
        $list->menu()->associate($menu);
        $dish->mlist()->associate($list);

        $dish->save();
        // Save image to folder /catalog
        $imageName = $dish->id . ' ' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(base_path() . '/public/images/catalog/', $imageName);
        
        // Insert into 'images' table
        $image = new Image(array(
          'link' => $imageName,
        ));
        $image->dish()->associate($dish);

        $image->save();
        return $this->getCreateDish();
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
    public function getCreateDish()
    {
        //
        return view('admin', ['menus' => Menu::all()]);
    }

    /**
     * Update list
     * @param XMLHttpRequest
     * @return data
     *
     */    
    public function updateList(Request $request)
    {
        //
        $mlists = Menu::find($request->input('menuid'))->mlists;
        //$lists = MList::where('menu_id', Request::input('menuid'));
        
        $html = '<option> ------------ </option>';
        $i = 0;
        foreach ($mlists as $mlist) {
            # code...
            $i++;
            $html .= '<option value = \''. strval($i) . '\'>' . $mlist->name . '</option>';
        }
        return $html;
    }
}
