<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CapacityAttribute extends Model
{
    protected $fillable = [
        'title', 'image', 'is_deleted'
    ];

    public function getAllCapacityAttribute() {
        return CapacityAttribute::get();
    }

    public static function getCapacityAttributeTitle($id) {
        $title = CapacityAttribute::where('id', $id)->where('is_deleted','0')->first();
    	if($title) {
    		return $title->title;
    	} else{
    		return false;
    	}
    }

    public static function getAllApprovedCapacityAttribute(){
        return CapacityAttribute::where('is_deleted','0')->get();
    }

    public static function getCapacityAttributeByID($id){
        return CapacityAttribute::where('id',$id)->first();
    }
}
