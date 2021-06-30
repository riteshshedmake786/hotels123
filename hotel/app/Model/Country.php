<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'status', 'is_deleted'
    ];

    public function getAllCountry() {
        return Country::get();
    }

    public static function getCountryTitle($id) {
        $title = Country::where('id', $id)->where('status','APPROVED')->where('is_deleted','0')->first();
    	if($title) {
    		return $title->name;
    	} else{
    		return false;
    	}
    }

    public static function getAllApprovedCountry(){
        return Country::where('status','APPROVED')->where('is_deleted','0')->get();
    }

    public function getCountryByID($id){
        return Country::where('id',$id)->first();
    }
}
