<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use App\Dish;

class ImageController extends Controller
{
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
    
    public function setAvatar($id)
    {
        //
        $image = Image::find($id);
        $image->update(['isAvatar' => true]);

        $dishid = $image->dish->id;
        Dish::find($dishid)->update(['avatar' => $image->link]);

        return redirect()->route('dish.edit', [$dishid]);
    }

    public function unsetAvatar($id)
    {
        //
        $image = Image::find($id);
        $image->update(['isAvatar' => false]);

        $dishid = $image->dish->id;
        Dish::find($dishid)->update(['avatar' => 'default.png']);

        return redirect()->route('dish.edit', [$dishid]);
    }
}
