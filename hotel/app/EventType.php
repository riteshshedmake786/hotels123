<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
	protected $table="event_type";
    protected $fillable = [
        'title', 'image', 'type','indoor_image','outdoor_image','is_deleted'
    ];
    public function getAllEventType() {
        return EventType::orderBy('id', 'ASC')->get();
    }
    public static function getEventTypeTitle($id) {
        $title = EventType::where('id', $id)->where('is_deleted','0')->first();
    	if($title) {
    		return $title->title;
    	} else{
    		return false;
    	}
    }
    public static function getAllApprovedEventType(){
        return EventType::where('is_deleted','0')->orderBy('id', 'ASC')->get();
    }
	
	public static function getAllApprovedEventType_type($type){
        return EventType::where('is_deleted','0')->where('type',$type)->orderBy('id', 'ASC')->get();
    }

    public static function getEventTypeByID($id){
        return EventType::where('id',$id)->first();
    }

}
