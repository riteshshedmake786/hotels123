<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hotel;
use App\User;
use App\Merchant;
use App\Model\City;
use App\EventType;
use App\Hotel_image_gallery;
use App\Model\HotelKeyAttribute;
use App\HotelsSubEntity;
use App\Model\HotelCapacityAttribute;
use App\Model\HotelFeatureAttribute;
use App\Model\HotelsEnquiry;
use DB;
use App\Supplier;
use App\SupplierType;
use App\SupplierProfile;
use App\SupplierProducts;
use App\SupplierImageGallery;
use App\Model\CapacityAttribute;
use App\Model\IncludeHotelCapacity;
use App\Facility;

class homeController extends Controller
{

    public function getHotelsHome()
    {
        $data["hotel_featured"] = DB::table('hotels')
                                ->select('hotels.id', 'hotels.name', 'added_by', 'sub_heading', 'location', 'country', 'state', 'city', 'lat', 'long', 'primary_number', 'capacity', 'featured_image', 'description', 'summary', 'hotels.status', 'is_featured', 'hotels.is_deleted', 'grade', 'cities.name as city_name')
                                ->leftjoin('cities', 'city', '=', 'cities.id')
                                ->where('hotels.is_deleted', 0)
                                ->where('hotels.is_featured', 1)
                                ->limit(6)
                                ->get();
								
		     $data["hotel_lists"] = DB::table('hotels')
                                ->select('hotels.id', 'hotels.name', 'added_by', 'sub_heading', 'location', 'country', 'state', 'city', 'lat', 'long', 'primary_number', 'capacity', 'featured_image', 'description', 'summary', 'hotels.status', 'is_featured', 'hotels.is_deleted', 'grade', 'cities.name as city_name')
                                ->leftjoin('cities', 'city', '=', 'cities.id')
                                ->where('hotels.is_deleted', 0)
                              //  ->where('hotels.is_featured', 1)
                                ->limit(4)
                                ->get();						
		
		
        $data['city'] = City::getAllApprovedCity();
        $data['event'] = EventType::getAllApprovedEventType();
		
		$data['supplierlist'] = SupplierType::getAllApprovedSupplierType();
		
		$data['event_social'] = EventType::getAllApprovedEventType_type('Social');
		
	
		
		$data['event_corporate'] = EventType::getAllApprovedEventType_type('Corporate');
		
		
        // dd($data);
        return view('front/home', $data);
    }

    public function getHotelsVenue($id)
    {
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['hotels_sub_entity'] = DB::table('hotels_sub_entity')
                                    ->select('hotels_sub_entity.id', 'hotel_id', 'title', 'sub_title', 'include_type', 'feature_image', 'type_attributes.name as type_name')
                                    ->leftjoin('type_attributes', 'type', '=', 'type_attributes.id')
                                    ->where('hotels_sub_entity.status', 'active')
                                    ->where('hotel_id', $id)
                                    ->get();
        $data['hotelKey'] = HotelKeyAttribute::getAllHotelKeyAttributeById($id);
        $data['capacityList'] = HotelCapacityAttribute::getAllHotelCapacityAttributeById($id);
        $data['featureList'] = HotelFeatureAttribute::getAllHotelFeatureAttributeById($id);
        return view('front/FeaturedVenue/venue', $data);
    }

    public function addVenueFavorite($id)
    {
        $ispresent = User::find(Auth::guard('web')->user()->id);
        if ($ispresent) {
            $ispresent->favorite_venue = $ispresent->favorite_venue . " " . $id;
            $ispresent->save();
        }
        return back()->with('success', 'Favorite Added Successfully');
    }

    public function removeVenueFavorite($id)
    {
        $ispresent = User::find(Auth::guard('web')->user()->id);
        if ($ispresent) {
            $favs = str_replace($id, '', $ispresent->favorite_venue);
            $ispresent->favorite_venue = $favs;
            $ispresent->save();
        }
        return back()->with('success', 'Favorite Remove Successfully');
    }

    public function getHotelsVenueBook(Request $request)
    {
        $hid = $request['hid'];
        $id = $request['id'];
        $hotels_sub_entity = DB::table('hotels_sub_entity')
                            ->select('hotels_sub_entity.id', 'hotel_id', 'title', 'sub_title', 'feature_image', 'description', 'type_attributes.name as type_name')
                            ->leftjoin('type_attributes', 'type', '=', 'type_attributes.id')
                            ->where('hotels_sub_entity.status', 'active')
                            ->where('hotel_id', $hid)
                            ->where('hotels_sub_entity.id', $id)
                            ->get();

        $hotels_sub_entity_d = DB::table('include_hotel_capacity_meta_data')
                            ->select('include_hotel_capacity_meta_data.*', 'capacity_attributes.*')
                            ->leftjoin('capacity_attributes', 'capacity_attributes.id', '=', 'include_hotel_capacity_meta_data.capacity_attribute_id')
                            ->where('include_hotel_capacity_meta_data.hotels_sub_entity_id', $id)
                            ->get();

        $hotel_include_menu = DB::table('include_hotel_menu_meta_data')
                            ->select('id', 'hotels_sub_entity_id', 'title', 'image', 'doc_file')
                            ->where('is_deleted', 0)
                            ->where('hotels_sub_entity_id', $id)
                            ->get();

        $entityData = array();
        foreach ($hotels_sub_entity as $value) {
            $entityData = $value;
        }

        $entityData->capacityData = array();
        foreach ($hotels_sub_entity_d as $value) {
            array_push($entityData->capacityData, $value);
        }

        $entityData->menuList = array();
        foreach ($hotel_include_menu as $value) {
            array_push($entityData->menuList, $value);
        }

        // dd($entityData);

        return view('front/FeaturedVenue/book_venue', compact('entityData'));
    }

    // public function getHotelsVenueList()
    // {
        
    //     $data['hotelSearch'] = DB::table('hotels')
    //             ->select('hotels.*', 'hotels_sub_entity.*', 'cities.name as city_name', 'event_type.title as event_title')
    //             ->join('cities', 'hotels.city', '=', 'cities.id')
    //             ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
    //             ->join('event_type', 'hotels_sub_entity.event_type', '=', 'event_type.id')
    //             ->join('include_hotel_capacity_meta_data', 'hotels_sub_entity.id', '=', 'include_hotel_capacity_meta_data.hotels_sub_entity_id')
    //             ->where('hotels_sub_entity.status', 'ACTIVE')
    //             ->Where('hotels.is_deleted', 0)
    //             ->distinct()
    //             ->get();
    //     $data['eventType'] = EventType::getAllApprovedEventType();
    //     $data['city'] = City::getAllApprovedCity();
    //     foreach ($data['hotelSearch'] as $value) {
    //         $cost = $value->cost;
    //         $discount = $value->discount;
    //         $price = $cost * $discount / 100;
    //         $getPrice = $cost - $price;
    //         $value->offeringPrice = $getPrice;
    //     };
    //     // dd($data);
    //     return view('front/FeaturedVenue/hotels', $data);
    // }
    public function getAllHotelsList()
    {
		echo "test";
		exit;
        $data['hotelSearch'] = DB::table('hotels')
                                ->select('hotels.*','cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->where('hotels.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                                ->distinct()
                                ->get();
        $data['city'] = City::getAllApprovedCity();
    //    dd($data);
        return view('front/FeaturedVenue/hotels', $data);
    }
	
	
	    public function getAllHotelsLists()
    {
	
        $data['hotelList'] = DB::table('hotels')
                                ->select('hotels.*','cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->where('hotels.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                                ->distinct()
                                ->get();
        $data['city'] = City::getAllApprovedCity();
    //    dd($data);
        return view('front/hotels/hotels', $data);
    }
    public function getHotelVenuesList($id)
    {
        $data['hotelList'] = DB::table('hotels')
                                ->select('hotels.*','cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->where('hotels.id', '=', $id)
                                ->where('hotels.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                                ->distinct()
                                ->get();
        $data['venueList'] = DB::table('hotels_sub_entity')
                                ->select('*')
                                ->where('hotel_id',$id)
                                ->where('hotels_sub_entity.status', 'ACTIVE') 
                                ->distinct()
                                ->get();
        $data['city'] = City::getAllApprovedCity();
        // dd($data);
        return view('front/FeaturedVenue/venueList', $data);
    }
	
	
	public function getHotelDetails($id)
	{
		$data['hotelsDetails'] = DB::table('hotels')
                                ->select('hotels.*','cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
                                //->where('hotels_sub_entity.id', '=', $id)
                                //->where('hotels_sub_entity.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                               // ->distinct()
                                ->first();
        $data['venus'] = DB::table('hotels_sub_entity')
                                ->where('hotels_sub_entity.hotel_id', '=', $id)
                                ->where('hotels_sub_entity.status', 'ACTIVE')
                                ->get();
								
	
                                 //dd($data['facilities']->facilities);
		/*					
      if( $data['facilities']->facilities !== "")
      {
            $array = explode(",", $data['facilities']->facilities);
            $data['facilities']->facilities =  $array;
            foreach ($data['facilities']->facilities as $i=>$facility) {
                $data['facilities']->facilities[$i] = Facility::find($facility);
            }
      }
	  */
        $data['city'] = City::getAllApprovedCity();
        $data['includeHotelCapacity'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
       // $data['User'] = User::find(Auth::guard('web')->user()->id);
        /*$data['venue_ids'] = ltrim($data['User']->favorite_venue);
        $data['venue_ids'] = explode(" ", $data['venue_ids']);
        foreach($data['venue_ids'] as $venue_id) {
            if($venue_id == $id) {
                $data['isfavorite'] = true;
            } else 
                $data['isfavorite'] = false;
        }
		
	     */
		 
		// summary location  city_name  banner_img  featured_image
	
	        $data["hotel_featured"] = DB::table('hotels')
                                ->select('hotels.id', 'hotels.name', 'added_by', 'sub_heading', 'location', 'country', 'state', 'city', 'lat', 'long', 'primary_number', 'capacity', 'featured_image', 'description', 'summary', 'hotels.status', 'is_featured', 'hotels.is_deleted', 'grade', 'cities.name as city_name')
                                ->leftjoin('cities', 'city', '=', 'cities.id')
                                ->where('hotels.is_deleted', 0)
                                ->where('hotels.is_featured', 1)
                                ->limit(3)
                                ->get();
	  
		
        return view('front/hotels/hoteldetails', $data);
	}
	
	
	
	
	
	
	public function getVenueDetails($id)
	{
		$data['hotelsDetails'] = DB::table('hotels')
                                ->select('hotels.*','cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
                                //->where('hotels_sub_entity.id', '=', $id)
                                //->where('hotels_sub_entity.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                               // ->distinct()
                                ->first();
        $data['venus'] = DB::table('hotels_sub_entity')
                                ->where('hotels_sub_entity.hotel_id', '=', $id)
                                ->where('hotels_sub_entity.status', 'ACTIVE')
                                ->get();
								
	
                                 //dd($data['facilities']->facilities);
		/*					
      if( $data['facilities']->facilities !== "")
      {
            $array = explode(",", $data['facilities']->facilities);
            $data['facilities']->facilities =  $array;
            foreach ($data['facilities']->facilities as $i=>$facility) {
                $data['facilities']->facilities[$i] = Facility::find($facility);
            }
      }
	  */
        $data['city'] = City::getAllApprovedCity();
        $data['includeHotelCapacity'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
       // $data['User'] = User::find(Auth::guard('web')->user()->id);
        /*$data['venue_ids'] = ltrim($data['User']->favorite_venue);
        $data['venue_ids'] = explode(" ", $data['venue_ids']);
        foreach($data['venue_ids'] as $venue_id) {
            if($venue_id == $id) {
                $data['isfavorite'] = true;
            } else 
                $data['isfavorite'] = false;
        }
		
	     */
		 
		// summary location  city_name  banner_img  featured_image
	
	        $data["hotel_featured"] = DB::table('hotels')
                                ->select('hotels.id', 'hotels.name', 'added_by', 'sub_heading', 'location', 'country', 'state', 'city', 'lat', 'long', 'primary_number', 'capacity', 'featured_image', 'description', 'summary', 'hotels.status', 'is_featured', 'hotels.is_deleted', 'grade', 'cities.name as city_name')
                                ->leftjoin('cities', 'city', '=', 'cities.id')
                                ->where('hotels.is_deleted', 0)
                                ->where('hotels.is_featured', 1)
                                ->limit(3)
                                ->get();
	  
		
        return view('front/hotels/venuedetails', $data);
	}
	
	
	
	
    public function getHotelVenuesDetails($id)
    {
        $data['venueDetails'] = DB::table('hotels')
                                ->select('hotels.*', 'hotels_sub_entity.*','cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
                                ->where('hotels_sub_entity.id', '=', $id)
                                ->where('hotels_sub_entity.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                                ->distinct()
                                ->get();
        $data['facilities'] = DB::table('hotels_sub_entity')
                                ->where('hotels_sub_entity.id', '=', $id)
                                ->where('hotels_sub_entity.status', 'ACTIVE')
                                ->first();
                                // dd($data['facilities']);
      if( $data['facilities']->facilities !== "")
      {
            $array = explode(",", $data['facilities']->facilities);
            $data['facilities']->facilities =  $array;
            foreach ($data['facilities']->facilities as $i=>$facility) {
                $data['facilities']->facilities[$i] = Facility::find($facility);
            }
      }
        $data['city'] = City::getAllApprovedCity();
        $data['includeHotelCapacity'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['User'] = User::find(Auth::guard('web')->user()->id);
        $data['venue_ids'] = ltrim($data['User']->favorite_venue);
        $data['venue_ids'] = explode(" ", $data['venue_ids']);
        foreach($data['venue_ids'] as $venue_id) {
            if($venue_id == $id) {
                $data['isfavorite'] = true;
            } else 
                $data['isfavorite'] = false;
        }
        // dd($data);
        return view('front/FeaturedVenue/venueListDetails', $data);
    }
    public function getSearchVenuesList(Request $request)
    {
        // dd($request);
        // $id = $request->id;
        $data['searchVenue'] = DB::table('hotels')
                                ->select('hotels.*', 'hotels_sub_entity.*', 'cities.name as city_name', 'event_type.title as event_title')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
                                ->join('event_type', 'hotels_sub_entity.event_type', '=', 'event_type.id')
                                // ->where('hotels_sub_entity.event_type', '=', $id)
                                ->where('hotels_sub_entity.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                                ->get();
        $data['city'] = City::getAllApprovedCity();
        // dd($data);
        return view('front/FeaturedVenue/searchVenue',$data);
    }
  
    public function getSearchHotelList(Request $request)
    {
        // dd($request);
        $value1 = $request['Category'];
        $value2 = $value1 + 200;
        $event_id = $request['type_of_venue'];
        $city = $request['location'];
        $where = "";
        if (!empty($event_id)) {
            $where .= "AND hotels_sub_entity.event_type = '" . $event_id . "'";
        }
        if (!empty($city)) {
            $where .= " AND hotels.city = '" . $city . "'";
        }
        $data['hotelSearch'] = DB::table('hotels')
                                ->select('hotels.*', 'hotels_sub_entity.*', 'cities.name as city_name')
                                ->join('cities', 'hotels.city', '=', 'cities.id')
                                ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
                                ->join('event_type', 'hotels_sub_entity.event_type', '=', 'event_type.id')
                                ->join('include_hotel_capacity_meta_data', 'hotels_sub_entity.id', '=', 'include_hotel_capacity_meta_data.hotels_sub_entity_id')
                                ->where('hotels_sub_entity.event_type', '=', $event_id)
                                ->where('hotels.city', $city)
                                ->whereBetween('include_hotel_capacity_meta_data.capacity_value', [$value1, $value2])
                                ->where('hotels_sub_entity.status', 'ACTIVE')
                                ->Where('hotels.is_deleted', 0)
                                ->distinct()
                                ->get();
        $data['eventType'] = EventType::getAllApprovedEventType();
        $data['city'] = City::getAllApprovedCity();
        $data['venue'] = $request['type_of_venue'];
        $data['Location'] = $request['location'];
        $data['category'] = $request['Category'];
        $data['category2'] = $value1 + 200;
        foreach ($data['hotelSearch'] as $value) {
            $cost = $value->cost;
            $discount = $value->discount;
            $price = $cost * $discount / 100;
            $getPrice = $cost - $price;
            $value->offeringPrice = $getPrice;
        }
        return view('front/FeaturedVenue/searchListHotel', $data);
    }
    public function venueEnquirySubmit(Request $request)
    {
        //dd($request);
        $hotelsEnquiry = HotelsEnquiry::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'mobile_no' => $request['mobile_no'],
            'event_type_id' => $request['event_type_id'],
            'message' => $request['message']
        ]);
        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function getHotelsByEvent($id)
    {
        $data['hotelSearch'] = DB::table('hotels')
            ->select('hotels.*', 'hotels_sub_entity.*', 'cities.name as city_name', 'event_type.title as event_title')
            ->join('cities', 'hotels.city', '=', 'cities.id')
            ->join('hotels_sub_entity', 'hotels.id', '=', 'hotels_sub_entity.hotel_id')
            ->join('event_type', 'hotels_sub_entity.event_type', '=', 'event_type.id')
            ->where('hotels_sub_entity.event_type', '=', $id)
            ->where('hotels_sub_entity.status', 'ACTIVE')
            ->Where('hotels.is_deleted', 0)
            ->distinct()
            ->get();

        //dd($data['hotelSearch']);
        $data['city'] = City::getAllApprovedCity();
        $data['eventType'] = EventType::getAllApprovedEventType();

        foreach ($data['hotelSearch'] as $value) {
            $cost = $value->cost;
            $discount = $value->discount;
            $price = $cost * $discount / 100;
            $getPrice = $cost - $price;
            $value->offeringPrice = $getPrice;
        }
//        dd($data);
        return view('front/FeaturedVenue/searchListHotel', $data);
    }
    public function getHotelsSupplierList()
    {
        $data['supplierList'] = DB::table('suppliers')
            ->select('suppliers.*', 'supplier_profile.*', 'cities.name as city_name')
            ->join('supplier_profile', 'suppliers.id', '=', 'supplier_profile.id')
            ->join('cities', 'supplier_profile.city', '=', 'cities.id')
            ->where('suppliers.status', 'ACTIVE')
            ->Where('supplier_profile.is_deleted', 0)
            ->distinct()
            ->get();
        $data['city'] = City::getAllApprovedCity();
        return view('front/FeaturedVenue/supplierList', $data);
    }
    public function getSupplierProductList($id)
    {
        $data['supplierList'] = DB::table('suppliers')
                ->select('suppliers.*', 'supplier_profile.*', 'cities.name as city_name')
                ->join('supplier_profile', 'suppliers.id', '=', 'supplier_profile.id')
                ->join('cities', 'supplier_profile.city', '=', 'cities.id')
                ->where('supplier_profile.id', '=', $id)
                ->where('suppliers.status', 'ACTIVE')
                ->Where('supplier_profile.is_deleted', 0)
                ->distinct()
                ->get();
        $data['productList'] = DB::table('supplier_profile')
                ->select('supplier_products.*')
                ->join('supplier_products', 'supplier_profile.id', '=', 'supplier_products.supplier_id')
                ->where('supplier_products.supplier_id', '=', $id)
                ->Where('supplier_profile.is_deleted', 0)
                ->whereOr('supplier_products.status', 'ACTIVE')
                ->distinct()
                ->get();
        foreach ($data['productList'] as $value) {
                $cost = $value->cost;
                $discount = $value->discount_offer;
                $price = $cost * $discount / 100;
                $getPrice = $cost - $price;
                $value->offeringPrice = $getPrice;
        }
        $data['galleryImage'] = SupplierImageGallery::getImagesByUsingSupplierId($id);
        $data['city'] = City::getAllApprovedCity();
        // dd($data);
        return view('front/FeaturedVenue/productList', $data);
    }
    public function imageDestroy($id)
    {
        // dd($id);
    	SupplierImageGallery::find($id)->delete();
    	return back()->with('success','Image removed successfully.');	
    }

}
