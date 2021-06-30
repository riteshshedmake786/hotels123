<?php
namespace App\Http\Controllers\User;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Hotel;
use App\User;
use App\Model\City;
use App\EventType;
use App\Hotel_image_gallery;
use App\Model\HotelKeyAttribute;
use App\HotelsSubEntity;
use App\Model\HotelCapacityAttribute;
use App\Model\HotelFeatureAttribute;
use App\Model\HotelsEnquiry;
use DB;

class ProfileController extends Controller
{
    public function profile()
    {
        $data['User'] = User::find(Auth::guard('web')->user()->id);
        $venue_ids = ltrim($data['User']->favorite_venue);
        $venue_ids = explode(" ", $venue_ids);
        // dd($venue_ids);
        // $data['hotelSearch'] = DB::table('hotels_sub_entity')
        //     ->select('hotels_sub_entity.*')
        //     ->where('hotels_sub_entity.status', 'ACTIVE')
        //     ->whereIn('hotels_sub_entity.id', $venue_ids)
        //     ->distinct()
        //     ->get();
        $data['hotelSearch'] = DB::table('hotels')
                ->select('hotels.*', 'hotels_sub_entity.*', 'cities.name as city_name')
                ->join('cities', 'hotels.city', '=', 'cities.id')
                ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
                ->where('hotels_sub_entity.status', 'ACTIVE')
                ->whereIn('hotels_sub_entity.id', $venue_ids)
                ->Where('hotels.is_deleted', 0)
                ->distinct()
                ->get();
        // dd($data);
        foreach ($data['hotelSearch'] as $value) {
            $cost = $value->cost;
            $discount = $value->discount;
            $price = $cost * $discount / 100;
            $getPrice = $cost - $price;
            $value->offeringPrice = $getPrice;
        }
        $data['city'] = City::getAllApprovedCity();
       // return view('user.auth.profile', $data);
	   
	   return view('front/profile', $data);
	   
    }

    public function updateProfile(Request $request)
    {

        $profile = User::find(Auth::guard('web')->user()->id);
        $profile->name = $request->full_name;
        $profile->email = $request->email_id;
        $profile->mobile = $request->mobile;
        $profile->company_name = $request->company_name;
        $profile->company_email = $request->company_email;
        $profile->save();
        $data['User'] = User::find(Auth::guard('web')->user()->id);
        return view('user.auth.profile', $data);
    }

    public function changePassword(Request $request)
    {
        $password = User::find(Auth::guard('web')->user()->id);
        if ($request->new_password == $request->confirm_password) {
            $password->password = Hash::make($request->confirm_password);
        }
        $password->save();
        $data['User'] = User::find(Auth::guard('web')->user()->id);


        return view('user.auth.profile', $data);
    }

}

?>
