<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class HotelFeatureAttribute extends Model
{
    protected $table="hotel_feature_attribute";

    protected $fillable = [
        'feature_attribute_id','hotel_id', 'description' ,'is_deleted'
    ];

    public static function getAllHotelFeatureAttributeById($id){
        return DB::table('hotel_feature_attribute')
                                ->select('hotel_feature_attribute.id','feature_attribute_id','hotel_id','description','hotel_feature_attribute.is_deleted','feature_attributes.title as feature_name','feature_attributes.image as feature_image')
                                ->leftjoin('feature_attributes','feature_attribute_id','=','feature_attributes.id')
                                ->where('hotel_id', $id)
                                ->get();
    }
}
