<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'country_id', 'status', 'is_deleted'
    ];

    public function getAllState() {
        return State::get();
    }

    public static function getStateTitle($id) {
        $title = State::where('id', $id)->where('status','APPROVED')->where('is_deleted','0')->first();
    	if($title) {
    		return $title->name;
    	} else{
    		return false;
    	}
    }

    public static function getAllApprovedState(){
        return State::where('status','APPROVED')->where('is_deleted','0')->get();
    }

    public function getStateByID($id){
        return State::where('id',$id)->first();
    }
}
