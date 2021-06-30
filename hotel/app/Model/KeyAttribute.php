<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KeyAttribute extends Model
{
    protected $fillable = [
        'title', 'image', 'is_deleted'
    ];

    public function getAllKeyAttribute() {
        return KeyAttribute::get();
    }

    public static function getKeyAttributeTitle($id) {
        $title = KeyAttribute::where('id', $id)->where('is_deleted','0')->first();
    	if($title) {
    		return $title->title;
    	} else{
    		return false;
    	}
    }

    public static function getAllApprovedKeyAttribute(){
        return KeyAttribute::where('is_deleted','0')->get();
    }

    public function getKeyAttributeByID($id){
        return KeyAttribute::where('id',$id)->first();
    }
}
