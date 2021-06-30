<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftImages extends Model
{
    //
    protected $table='draft_images';
    protected $fillable= ['image_name'];
    public function getAllImages() {
        return DraftImages::get();
    }
    public static function getImagesByID($id){
        return DraftImages::where('id',$id)->first();
    }
}
