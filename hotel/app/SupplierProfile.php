<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierProfile extends Model
{
    
    protected $table="supplier_profile";

    protected $fillable=['name','sub_heading','location','country','state','city','lat','long','primary_number','capacity','featured_image','banner_img','description','summary','status','is_featured','is_deleted','grade','if_is_supplier_id','added_by','services','email','supported_payment_method','facebook','instagram','twitter','you_tube','website','brand,line_of_business'];
    
    public function getAllSupplierProfile() {
        return SupplierProfile::get();
    }
    public static function getSupplierViewBySupplierId($id){
    	return SupplierProfile::where('id',$id)->first();
    }

    public function getAllSupplierCount(){
        return SupplierProfile::where('status', 'ACTIVE')->where('is_deleted', 0)->count();

    }

    public function getAllHotelCountBySupplierId($id){
        return SupplierProfile::where('status', 'ACTIVE')->where('is_deleted', 0)->where('if_is_supplier_id', $id)->count();

    }
    public function getAllHotelBySupplier($id){
        return SupplierProfile::where('if_is_supplier_id', $id)->count();

    }
    public  static function getAllSupplier()
    {
        return Supplier::get();
    }
}
