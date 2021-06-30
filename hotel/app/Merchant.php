<?php

namespace App;

use App\Notifications\MerchantResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='merchants';
    protected $fillable = [
        'name',
        'email',
        'password',
        'merchant_password',
        'company_name',
        'location',
        'landline_no',
        'mobile_no',
        'm_img',
        'city',
        'area',
        'agree',
        'city_code',
        'country',
        'email_token',
        'is_active'
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
        $this->notify(new MerchantResetPassword($token));
    }
    /*public static function getAllMerchant(){
        return Merchant::get();
    }*/
    public function getAllMerchantCount(){
        return Merchant::count();
    }

    public  static function getAllMerchant()
    {
        return Merchant::get();
    }
}
