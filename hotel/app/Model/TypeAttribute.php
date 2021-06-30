<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeAttribute extends Model
{
    protected $fillable = [
        'name','is_deleted'
    ];

    public function getAllTypeAttribute() {
        return TypeAttribute::get();
    }

    public static function getTypeAttributeTitle($id) {
        $title = TypeAttribute::where('id', $id)->where('is_deleted','0')->first();
    	if($title) {
    		return $title->name;
    	} else{
    		return false;
    	}
    }

    public static function getAllApprovedTypeAttribute(){
        return TypeAttribute::where('is_deleted','0')->get();
    }

    public static function getTypeAttributeByID($id){
        return TypeAttribute::where('id',$id)->first();
    }
}
