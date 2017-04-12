<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use App\Dish;

class ImageController extends Controller
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
        //
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
         $image = Image::find($id);
        $dishid = $image->dish->id;
        if ($image->isAvatar) {
            # code...
            Dish::find($dishid)->update(['avatar' => 'default.png']);
        }
        $image->delete();
        return redirect()->route('dish.edit', [$dishid]);
    }
    
    public function set($id)
    {
        //
        $image = Image::find($id);
        $image->update(['isAvatar' => true]);

        $dishid = $image->dish->id;
        Dish::find($dishid)->update(['avatar' => $image->link]);

        return redirect()->route('dish.edit', [$dishid]);
    }

    public function unset($id)
    {
        //
        $image = Image::find($id);
        $image->update(['isAvatar' => false]);

        $dishid = $image->dish->id;
        Dish::find($dishid)->update(['avatar' => 'default.png']);

        return redirect()->route('dish.edit', [$dishid]);
    }
}
