<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class IncludeHotelMenu extends Model
{
    protected $table="include_hotel_menu_meta_data";

    protected $fillable = [
        'hotels_sub_entity_id','category_title','title', 'image','doc_file','is_deleted','cost','discount'
    ];

    public static function getAllIncludeHotelMenuData($id){
    	return DB::table('include_hotel_menu_meta_data')
                ->select('id','hotels_sub_entity_id','category_title','title', 'image','doc_file','is_deleted')
                ->where('include_hotel_menu_meta_data.is_deleted' , 0)
                ->where('include_hotel_menu_meta_data.hotels_sub_entity_id' , $id)
                ->get();
    }
}
