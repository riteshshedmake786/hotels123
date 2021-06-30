<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class HotelKeyAttribute extends Model
{
    protected $table="hotel_key_attribute";

    protected $fillable = [
        'key_attribute_ids', 'hotel_id', 'description' ,'is_deleted'
    ];

    public static function getAllHotelKeyAttribute($id){
    	return DB::table('hotel_key_attribute')
                                ->select('hotel_key_attribute.id','key_attribute_ids','hotel_id','description','hotel_key_attribute.is_deleted','key_attributes.title as key_name','key_attributes.image as ket_image')
                                ->leftjoin('key_attributes','key_attribute_ids','=','key_attributes.id')
                                ->where('hotel_key_attribute.hotel_id' , $id)
                                ->get();
    }

    public static function getAllHotelKeyAttributeById($id){
        return DB::table('hotel_key_attribute')
                                ->select('hotel_key_attribute.id','key_attribute_ids','hotel_id','description','hotel_key_attribute.is_deleted','key_attributes.title as key_name','key_attributes.image as ket_image')
                                ->leftjoin('key_attributes','key_attribute_ids','=','key_attributes.id')
                                ->where('hotel_id', $id)
                                ->get();
    }

}
