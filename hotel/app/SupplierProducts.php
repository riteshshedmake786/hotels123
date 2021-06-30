<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierProducts extends Model
{
    
    protected $table="supplier_products";

    protected $fillable=['supplier_id','products','cost','discount_offer','image','category','description','summary'];

    public static function getProductViewBySupplierId($id){
    	return SupplierProducts::where('id',$id)->first();
    }

    public  static function getAllSupplier()
    {
        return Supplier::get();
    }
    public function getAllProductsCount(){
        return SupplierProducts::where('status', 'ACTIVE')->count();
    }
}
