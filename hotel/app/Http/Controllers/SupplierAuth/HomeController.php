<?php

namespace App\Http\Controllers\SupplierAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Supplier;
use App\Merchant;
use App\HotelsSubEntity;
use App\Hotel;
use App\City;
use App\Countri;
use App\State;
use DB;
class HomeController extends Controller
{
   
    public function supplierDashboard(){
       return view('supplier/home');
    }

}
