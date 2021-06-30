<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierImageGallery extends Model
{
    //
    protected $table='supplier_image_gallery';
    protected $fillable= ['supplier_id','supplier_product_id','image','order','description','is_deleted'];

    public static function getImagesByUsingSupplierId($id){
    	return SupplierImageGallery::where('supplier_id',$id)->get();

    }
}
