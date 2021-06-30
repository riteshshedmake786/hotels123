<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel_image_venue extends Model
{
    //
    protected $table='hotel_image_venue';
    protected $fillable= ['hotel_id','hotel_sub_entity_id','image','order','description','is_deleted'];

    public static function getImagesByUsingHotelId($id){
    	return Hotel_image_venue::where('hotel_id',$id)->get();

    }
    public static function getImagesByUsingHotelVenueId($id){
    	return Hotel_image_venue::where('hotel_sub_entity_id',$id)->get();

    }
}
