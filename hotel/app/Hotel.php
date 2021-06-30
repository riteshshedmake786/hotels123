<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    
    protected $table="hotels";

    protected $fillable=['name','sub_heading','location','country','state','city','lat','long','primary_number','capacity','featured_image','banner_img','description','summary','status','is_featured','is_deleted','grade','if_is_merchant_id','if_is_admin_id','added_by'];

    public static function getHotelViewByHotelId($id){
    	return Hotel::where('id',$id)->first();
    }

    public function getAllHotelCount(){
        return Hotel::where('status', 'ACTIVE')->where('is_deleted', 0)->count();

    }

    public function getAllHotelCountByMerchantId($id){
        return Hotel::where('status', 'ACTIVE')->where('is_deleted', 0)->where('if_is_merchant_id', $id)->count();

    }
    public function getAllHotelByMerchant($id){
        return Hotel::where('if_is_merchant_id', $id)->count();

    }
    public  static function getAllHotel()
    {
        return Hotel::get();
    }
}
