<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelsSubEntity extends Model
{
    protected $table='hotels_sub_entity';
    protected $fillable= ['hotel_id','title','sub_title','type','feature_image', 'include_type','facilities', 'event_type', 'description','status','cost','discount'];

     public function getAllHotelsSubEntityCount(){
        return HotelsSubEntity::where('status', 'ACTIVE')->count();
    }

}
