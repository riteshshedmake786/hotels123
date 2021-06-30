<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierType extends Model
{
	protected $table="supplier_type";
    protected $fillable = [
        'title', 'image', 'is_deleted'
    ];
    public function getAllSupplierType() {
        return SupplierType::get();
    }
    public static function getSupplierTypeTitle($id) {
        $title = SupplierType::where('id', $id)->where('is_deleted','0')->first();
    	if($title) {
    		return $title->title;
    	} else{
    		return false;
    	}
    }
    public static function getAllApprovedSupplierType(){
        return SupplierType::where('is_deleted','0')->orderBy('id', 'asc')->get();
    }

    public static function getSupplierTypeByID($id){
        return SupplierType::where('id',$id)->first();
    }

}
