<?php

namespace App\Http\Controllers\Admin;

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

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $menus = Menu::all();
        $dishes = Dish::all();
        
        return view('Admin.dish.index', ['menus' => $menus, 'dishes' => $dishes]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 
        return view('Admin.dish.create', ['menus' => Menu::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:dishes|max:255',
            'price' => 'required',
            'description' => 'required|max:255',
            'image' => 'required',
            'list' => 'required',
            'menu' => 'required',
            ]);
        $dish = new Dish(array(
          'name' => $request->get('name'),
          'price'  => $request->get('price'),
          'description' => $request->get('description'),
          ));
        $list = MList::find($request->get('list'));
        //$list->menu()->associate($menu);
        $dish->mlist()->associate($list);

        $dish->save();
        Session::flash('success', 'Dish was successfully stored!');
        // Save image to folder /catalog
        $imageName = $dish->id . '.' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(base_path() . '/public/images/catalog/'.$dish->id.'/', $imageName);
        
        // Insert into 'images' table
        $image = new Image(array(
          'link' => $imageName,
          ));
        $image->dish()->associate($dish);
        $image->save();
        return redirect()->route('dish.create');


        //$imageName = 'test.' . $request->file('image')->getClientOriginalName();
        /* $request->file('image')->move(base_path() . '/public/images/catalog/test/', $imageName);*/
        /*unlink(asset('images/test/test.603671_244522782337685_405366317_n.jpg'));
        dd(asset('public/images/test/test.603671_244522782337685_405366317_n.jpg'));*/

        //$image = public_path('images/catalog/test/test.603671_244522782337685_405366317_n.jpg');
        //dd(public_path('images/catalog/test/test.603671_244522782337685_405366317_n.jpg'));
        //dd(File::exists($image));
        /*if(File::exists($image)){
            File::delete($image); 
        } 
        dd('done');*/
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
        //dd(Dish::find($id));
        //dd(Dish::find($id)->mlist->menu_id);
        $cur_menu = Menu::find(Dish::find($id)->mlist->menu_id)->name;
        $cur_list = Dish::find($id)->mlist->name;
        $lists = Menu::find(Dish::find($id)->mlist->menu_id)->mlists;
        $images = Dish::find($id)->images;
        //dd($lists[4]->name);

        return view('Admin.dish.edit',['dish' => Dish::find($id), 'cur_list' =>$cur_list, 'cur_menu' => $cur_menu, 'images' => $images]);
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

            $imageName = $image->id . '_' . $request->file('image')->getClientOriginalName();
            $image->update(['link' => $imageName]);
            $request->file('image')->move(base_path() . '/public/images/catalog/'.$dish->id, $imageName);
        }
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
        //
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
        return redirect()->route('dish.index');
    }

    /**
     * Update list by AJAX
     * @param XMLHttpRequest
     * @return data
     *
     */
    public function AJAXListEdit(Request $request){
        $menuid = $request->input('menuid');
            # code...
        $html = '<input class="mdl-textfield__input" type="text" name="list" id="list_options" value=" " readonly tabIndex="-1">
        <label for="list_options">
            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
        </label>
        <label for="list_options" class="mdl-textfield__label">List</label>
        <ul for="list_options" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">';
            $mlists = Menu::where('name', $menuid)->first()->mlists;
            foreach ($mlists as $mlist) {
                $html .= '<li class="mdl-menu__item">'.$mlist->name.'</li>';
            }
        //dd($html);
            $html .= '</ul>';
            return $html;
        }    
        public function AJAXList(Request $request)
        {
        //
            $menuid = $request->input('menuid');
            $html = '<option value= \'\'></option>';

            if ($menuid == "all" || $menuid == "") {
            # code...
                return $html;
            }
            if ($menuid != "all") {
            # code...
                $mlists = Menu::find($menuid)->mlists;
                $i = 0;
                foreach ($mlists as $mlist) {
                    $i++;
                    $html .= '<option value = \''. strval($i) . '\'>' . $mlist->name . '</option>';
                }
            }
            return $html;
        }
    /**
     * Update dish by AJAX
     * @param XMLHttpRequest
     * @return data
     *
     */
    public function AJAXDish(Request $request){
        //dd('listid: ' .$request->get('listid'));
        $listid = $request->input('listid');
        $menuid = $request->input('menuid');
        $html = '';
        //
        if ($request->get('listid') == "") {
            # code...
            return $html;
        }
        if ($listid != "all"){
            # code...
            # return all dishes in a list
            $dishes = MList::find($listid)->dishes;

        } else if ($menuid != "all"){
            # return all dishes in a menu
            $mlists = Menu::find($menuid)->mlists;
            $dishes = array();
            foreach ($mlists as $mlist) {
                # code...
                foreach ($mlist->dishes as $dish) {
                    # code...
                    array_push($dishes, $dish);
                }   
            }     
        }  else {
            # return all dishes
            $dishes = Dish::all();
        }
        foreach ($dishes as $dish) {
            $update = route('dish.edit', ['id' => $dish->id]);
            $delete = route('dish.destroy', ['id' => $dish->id]);
            # code...
            $html .= '<div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title">
                    <div class="mdl-card__title-text">
                        Image
                    </div>
                </div>
                <div class="mdl-card__media">
                    <img src="'. asset('images/catalog/').$dish->id.'/'.$dish->avatar. '" width="100%" height="140" border="1">
                </div>
                <div class="mdl-card__supporting-text">
                    Descriptions
                </div>
                <div class="mdl-card__actions mdl-grid">
                    <div class="mdl-cell mdl-cell--3-col">
                        <form action="'.route('dish.edit', ['id' => $dish->id]).'" method="get">
                            <input type="hidden" name="_token" value="'. csrf_token() .'">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Edit</button>
                        </form></div>
                        <div class="mdl-cell mdl-cell--3-col">
                            <form action="'. route('dish.destroy', ['id' => $dish->id]).'" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="'.csrf_token() .'">
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Delete</button>
                            </form></div>
                        </div>
                    </div>
                </div>';
            }
            return $html;
        }
    }
