<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeatureAttribute extends Model
{
    protected $fillable = [
        'title', 'image', 'is_deleted'
    ];

    public function getAllFeatureAttribute() {
        return FeatureAttribute::get();
    }

    public static function getFeatureAttributeTitle($id) {
        $title = FeatureAttribute::where('id', $id)->where('is_deleted','0')->first();
    	if($title) {
    		return $title->title;
    	} else{
    		return false;
    	}
    }

    public static function getAllApprovedFeatureAttribute(){
        return FeatureAttribute::where('is_deleted','0')->get();
    }

    public static function getFeatureAttributeByID($id){
        return FeatureAttribute::where('id',$id)->first();
    }
}
