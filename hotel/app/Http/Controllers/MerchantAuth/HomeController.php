<?php

namespace App\Http\Controllers\MerchantAuth;

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
    public function __construct()
    {
        $this->middleware('merchant');
        $this->hotel = new Hotel();
        $this->merchant = new Merchant();
        $this->supplier = new Supplier();
        $this->hotelsSubEntity = new HotelsSubEntity();
    }
    public function merchantDashboard(){
        $mid=Auth::guard('merchant')->user()->id;
        $data['hotelCount'] = $this->hotel->getAllHotelCountByMerchantId($mid);
        $data['merchantCount'] = $this->merchant->getAllMerchantCount();
        $data['supplierCount'] = $this->supplier->getAllSupplierCount();
        $data['hotelsSubEntityCount'] = $this->hotelsSubEntity->getAllHotelsSubEntityCount();
        //dd($data['merchantCount']);
       return view('merchant/home',$data);
    }

     public function getHotelMerchantList()
    {
        return view('merchant/HotelMerchant/hotelMerchantList');
    }
   
    public function getHotelMerchantSingleView()
    {
        return view('merchant/HotelMerchant/hotelMerchantSingleView');
    }
    public function getHotelKeyMerchant()
    {
        return view('merchant/HotelMerchant/keyFactMerchant');
    }
     public function getHotelCapacityMerchant()
    {
        return view('merchant/HotelMerchant/capacityMerchant');
    }
     public function getHotelFeaturedMerchant()
    {
        return view('merchant/HotelMerchant/featuredMerchant');
    }

     public function AddHotelsMerchantIncludes()
    {
        return view('merchant/HotelMerchant/add_hotel_merchant');
    }
    public function addHotelsMerchant(){

        $data['City']=City::get();
        $data['Countri']=Countri::get();
        $data['State']=State::get();
        return view('merchant/HotelMerchant/add_hotel', $data);
        
    }

}
