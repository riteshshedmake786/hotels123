<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class HotelCapacityAttribute extends Model
{
    protected $table="hotel_capacity_attribute";

    protected $fillable = [
        'capacity_attribute_id','hotel_id', 'capacity_value' ,'is_deleted'
    ];

    public static function getAllHotelCapacityAttribute($id){
    	return DB::table('hotel_capacity_attribute')
                                ->select('hotel_capacity_attribute.id','capacity_attribute_id','hotel_id','capacity_value','hotel_capacity_attribute.is_deleted','capacity_attributes.title as capacity_name','capacity_attributes.image as capacity_image')
                                ->leftjoin('capacity_attributes','capacity_attribute_id','=','capacity_attributes.id')
                                ->where('hotel_capacity_attribute.hotel_id' , $id)
                                ->get();
    }

    public static function getAllHotelCapacityAttributeById($id){
        return DB::table('hotel_capacity_attribute')
                                ->select('hotel_capacity_attribute.id','capacity_attribute_id','hotel_id','capacity_value','hotel_capacity_attribute.is_deleted','capacity_attributes.title as capacity_name','capacity_attributes.image as capacity_image')
                                ->leftjoin('capacity_attributes','capacity_attribute_id','=','capacity_attributes.id')
                                ->where('hotel_id', $id)
                                ->get();
    }
}
