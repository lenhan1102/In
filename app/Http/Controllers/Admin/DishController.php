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
    public function index(Request $request)
    {
        //
        $menus = Menu::all();
        $dishes = Dish::all();

        return view('admin.admin-indexDish', ['dishes' => $dishes, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 
        return view('Admin.admin-createDish', ['menus' => Menu::all()]);
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
        return $this->create();
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
        //dd($lists[4]->name);

        return view('Admin/admin-editDish',['dish' => Dish::find($id), 'menus' => Menu::all(), 'lists' => $lists, 'cur_list' =>$cur_list, 'cur_menu' => $cur_menu]);
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

    /**
     * Update list by AJAX
     * @param XMLHttpRequest
     * @return data
     *
     */
    public function AJAXListEdit(Request $request){
        $menuid = $request->input('menuid');
            # code...
        $html = '';
        $mlists = Menu::find($menuid)->mlists;
        $i = 0;
        foreach ($mlists as $mlist) {
            $i++;
            $html .= '<option value = \''. strval($i) . '\'>' . $mlist->name . '</option>';
        }
        return $html;
    }    
    public function AJAXList(Request $request)
    {
        //
        $menuid = $request->input('menuid');
        $html = '<option value= \'\'>---------------</option><option value= \'all\'> All </option>';

        if ($menuid == "all" || $menuid == "") {
            # code...
            return $html;
        }
        if ($menuid != "all") {
            # code...
            $mlists = Menu::find($menuid)->mlists;
            /*if ($request->input('dishid')){
                $dishid = $request->input('dishid');
                $i = 0;
                foreach ($mlists as $mlist) {
                    $i++;
                    if (Dish::find($dishid)->mlist->id = $mlist->id) {
                        # code...
                        $html .= '<option value = \''. strval($i) . '\' selected >' . $mlist->name . '</option>';
                    } else {
                        $html .= '<option value = \''. strval($i) . '\'>' . $mlist->name . '</option>';
                    }  
                }
            } else {*/
                $i = 0;
                foreach ($mlists as $mlist) {
                    $i++;
                    $html .= '<option value = \''. strval($i) . '\'>' . $mlist->name . '</option>';
                }
                /*}*/ 
            }
            return $html;
        //return '<option value= \'\'>---------------</option><option value= \'all\'> All </option>';
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
            # code...
            $html .= 
            '<div class="mdl-cell mdl-cell--3-col">
            <a class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">'. $dish->name .'</h2>
                </div>

                <div class="mdl-card__supporting-text"> '. $dish->description .' </div>
                <div class="mdl-card__actions mdl-card--border"> 
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-dialog"
                    href="editDish/'. $dish->id .'"> Get Started </a> 
                </div>
            </a>
        </div>';
    }
    return $html;
}
}
