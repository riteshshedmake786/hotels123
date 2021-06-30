<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelsEnquiry extends Model
{
	protected $table = 'hotels_enquiry';

    protected $fillable = [
        'first_name', 'last_name', 'mobile_no', 'event_type_id', 'message'
    ];

    public function getHotelsEnquiry() {
        return HotelsEnquiry::get();
    }
}
