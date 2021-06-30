<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table="facilities";
    protected $fillable = [
        'title', 'image', 'is_deleted'
    ];
    public function getAllFacility() {
        return Facility::get();
    }
    public static function getFacilityTitle($id) {
        $title = Facility::where('id', $id)->where('is_deleted','0')->first();
        if($title) {
            return $title->title;
        } else{
            return false;
        }
    }
    public static function getAllApprovedFacility(){
        return Facility::where('is_deleted','0')->orderBy('id', 'asc')->get();
    }

    public static function getFacilityByID($id){
        return Facility::where('id',$id)->first();
    }
}
