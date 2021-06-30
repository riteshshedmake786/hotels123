<?php

namespace App;

use App\Notifications\SupplierResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','supplier_password','company_name', 'location','landline_no','mobile_no','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SupplierResetPassword($token));
    }

    /*public static function getAllSupplier(){
        return Supplier::get();
    }*/
    public static function getAllSupplierCount(){
        return Supplier::count();
    }

    public static function getAllSupplier(){
        return Supplier::get();
    }
}

