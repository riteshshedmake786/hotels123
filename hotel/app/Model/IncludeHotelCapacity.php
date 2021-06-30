<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class IncludeHotelCapacity extends Model
{
    protected $table="include_hotel_capacity_meta_data";

    protected $fillable = [
        'capacity_attribute_id','hotels_sub_entity_id', 'capacity_value' ,'capacity_value','socialdistancing_capacity','is_deleted'
    ];


    public static function getAllIncludeHotelCapacityData($id){
    	return DB::table('include_hotel_capacity_meta_data')
                ->select('include_hotel_capacity_meta_data.id','capacity_attribute_id','capacity_value','socialdistancing_capacity','hotels_sub_entity_id','include_hotel_capacity_meta_data.is_deleted','capacity_attributes.title as capacity_name','capacity_attributes.image as capacity_image')
                ->leftjoin('capacity_attributes','capacity_attribute_id','=','capacity_attributes.id')
                ->where('include_hotel_capacity_meta_data.is_deleted' , 0)
                ->where('include_hotel_capacity_meta_data.hotels_sub_entity_id' , $id)
                ->get();
    }
}
