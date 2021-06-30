<?php

namespace App\Http\Controllers\MerchantAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merchant;

class MerchantListController extends Controller
{

	public function __construct()
    {
        $this->middleware('merchant');
    }

    public function getAllMerchant()
    {
        $data['merchantData']= Merchant::getAllMerchant();
        return view('merchant/merchantUsers/usersList',$data);
        
    }

    
}
