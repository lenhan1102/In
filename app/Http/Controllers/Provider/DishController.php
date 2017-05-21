<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use App\MList;
use App\Menu;
use App\Image;
use File;
use Storage;
use Session;
use Gate;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('manage', new Dish)) {
            return response('Insufficient permissions', 401);
        }
        $menus = Menu::all();
        $dishes = Dish::all();
        
        return view('Provider.dish.dish_index', ['menus' => $menus, 'dishes' => $dishes]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Gate::denies('create', new Dish)) {
            return response('Insufficient permissions', 401);
        }
        return view('Provider.dish.dish_create', ['menus' => Menu::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('store', new Dish)) {
            return response('Insufficient permissions', 401);
        }
        $this->validate($request, [
            'name' => 'required|unique:dishes|max:255',
            'price' => 'required',
            'description' => 'required|max:255',
            'image' => 'required',
            'menu' => 'required',
            ]);
        $dish = new Dish(array(
          'name' => $request->get('name'),
          'price'  => $request->get('price'),
          'description' => $request->get('description'),
          ));
        $menu = Menu::find($request->menu);
        $dish->menu()->associate($menu);
        $dish->save();
        $dish->addToIndex();
        

        // Save image to folder /catalog
        $imageName = time().'-'. $request->file('image')->getClientOriginalName();
        //$request->file('image')->move(base_path() . '/public/images/catalog/'.$dish->id.'/', $imageName);
        $request->file('image')->move(base_path() . '/public/images/catalog/', $imageName);
        Session::flash('success', 'Dish was successfully stored!');
        // Insert into 'images' table
        $image = new Image(array(
          'link' => $imageName,
          ));
        $image->dish()->associate($dish);
        $image->save();

        //elastic

        Dish::reindex();
        return redirect()->route('dish.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cur_menu = Dish::find($id)->menu->name;
        $images = Dish::find($id)->images;
        //dd($lists[4]->name);

        return view('Provider.dish.dish_edit',['dish' => Dish::find($id), 'cur_menu' => $cur_menu, 'images' => $images]);
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
        if (Gate::denies('update', new Dish)) {
            return response('Insufficient permissions', 401);
        }
        $this->validate($request, [
            'price' => 'required',
            'description' => 'required|string|max:255',
            'image' => 'image'
            ]);

        $dish = Dish::find($request->input('id'));
        $dish->price = $request->input('price');
        $dish->description = $request->input('description');
        $dish->save();

        if ($request->file('image') != null) {
            # code...
            $image = new Image();
            $image->dish_id = $request->input('id');
            
            $image->save();

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $image->update(['link' => $imageName]);
            //$request->file('image')->move(base_path() . '/public/images/catalog/'.$dish->id, $imageName);
            $request->file('image')->move(base_path() . '/public/images/catalog/', $imageName);
        }
        Dish::reindex();
        Session::flash('success', 'Updated successfully');
        return redirect()->route('dish.edit', ['id' => $dish->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('destroy', new Dish)) {
            return response('Insufficient permissions', 401);
        }

        $arr = array();

        $dish = Dish::find($id);
        $images = $dish->images;
        foreach ($images as $image) {
            # code...
            array_push($arr,$image->link);
            $image->delete();
        }
        for ($i=0; $i < count($arr); $i++) { 
            File::delete(public_path('images/catalog/'.$dish->id.'/'.$arr[$i]));
        }
        Dish::destroy($id);
        Dish::reindex();

        return redirect()->route('dish.index');
    }

    public function getGallery($id){
        $images = Dish::find($id)->images;
        //dd($images);
        return view('Provider.dish.dish_gallery', ['images' => $images, 'id' => $id]);
    }
}

