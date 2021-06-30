<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'email', 'user_type', 'mobile','password','company_name','company_email','favorite_venue'
    ];
}
?>