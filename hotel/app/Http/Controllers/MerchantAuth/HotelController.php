<?php

namespace App\Http\Controllers\MerchantAuth;

use App\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Supplier;
use App\Merchant;
use App\Hotel;
use App\EventType;
use App\Hotel_image_gallery;

use App\Hotel_image_venue;
use App\Model\City;
use App\Model\Country;
use App\Model\State;
use DB;
use App\HotelsSubEntity;
use App\Model\KeyAttribute;
use App\Model\TypeAttribute;
use App\Model\HotelKeyAttribute;
use App\Model\CapacityAttribute;
use App\Model\HotelCapacityAttribute;
use App\Model\IncludeHotelMenu;
use App\Model\FeatureAttribute;
use App\Model\HotelFeatureAttribute;
use App\Model\IncludeHotelCapacity;
use App\DraftImages;
use App\Model\Booking;


class HotelController extends Controller
{

    public function __construct()
    {
        $this->middleware('merchant');
    }

    public function getHotelAddForm()
    {
        $data['Merchant'] = Merchant::find(Auth::guard('merchant')->user()->id);
        $data['City'] = City::getAllApprovedCity();
        $data['Countri'] = Country::getAllApprovedCountry();
        $data['State'] = State::getAllApprovedState();
        $data['Hotel'] = HotelsSubEntity::get();
        $data['gallery_images'] = [];
        $data['hotelsData'] = null;
        if (Auth::guard('merchant')->user()->is_active == 1) {
            return view('merchant/HotelMerchant/add_hotel', $data);
        } else {
            $data['isactive'] = 0;
            return view('merchant/HotelMerchant/add_hotel', $data);
        }

    }
    public function uploadFeaturedImage(Request $request)
    {
        $folderPath = public_path('uploads/hotels_featured_images/');
        $image_parts = explode(";base64,", $request->fimage);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        $imageType = 'featured_image';
        $image = new DraftImages; 
        $image->image_name = $imageName;
        $image->image_type = $imageType;
        $image->save();   
        return response()->json(['success' => 'success']);
    }
    public function uploadBannerImage(Request $request)
    {
        $folderPath = public_path('uploads/hotels_banner_images/');
        $image_parts = explode(";base64,", $request->bimage);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        $imageType = 'banner_image';
        $image = new DraftImages; 
        $image->image_name = $imageName;
        $image->image_type = $imageType;
        $image->save();   
        return response()->json(['success' => 'success']);
    }
    public function uploadGalleryImage(Request $request)
    {
        $folderPath = public_path('uploads/hotels_gallery_images/');
        $image_parts = explode(";base64,", $request->gimage);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        $imageType = 'gallery_image';
        $image = new DraftImages; 
        $image->image_name = $imageName;
        $image->image_type = $imageType;
        $image->save();   
        return response()->json(['success' => 'success']);
    }
    public function addHotelData(Request $request)
    {
        $ispresent = Hotel::where('if_is_merchant_id', Auth::guard('merchant')->user()->id)->first();
        if($request->hasfile('fimage'))
        {
        $featured_image = DB::table('draft_images')->select('image_name')->where('image_type','featured_image')->value('image_name');
        }
        else
        {
        $featured_image = $ispresent->featured_image;
        }
        if($request->hasfile('bimage'))
        {
        $banner_image = DB::table('draft_images')->select('image_name')->where('image_type','banner_image')->value('image_name');
        }
        else
        {
        $banner_image = $ispresent->banner_img;
        }
        $this->validate(request(), [
            'hotel_name' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'grade' => 'required',
            'is_featured' => 'required',
        ]);
        if ($ispresent) {
			
					
			
			
			
			
			
            Hotel::where('id', $ispresent->id)->update([
                'name' => $request->hotel_name,
                'sub_heading' => 'NA',
                'location' => $request->address_address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'long' => $request->address_longitude,
                'lat' => $request->address_latitude,
                'primary_number' => $request->landline_number,
                'capacity' => 0,
                'added_by' => "MERCHANT",
                'if_is_merchant_id' => Auth::guard('merchant')->user()->id,
                'featured_image' => $featured_image,
                'description' => $request->description,
                'banner_img' => $banner_image,
                'summary' => $request->summary,
                'is_featured' => $request->is_featured,
                'is_deleted' => 0,
                'grade' => $request->grade
            ]);
            $hotel_id = $ispresent->id; 
            DraftImages::truncate();
			
			// Hotel gallery images 
			
			 if($galleries=$request->file('gallery'))
			   {
				   $i=1;
                foreach($galleries as $file)
				 {
                    //$name=$file->getClientOriginalName();
					
					 $gallery_name = "hotel_".$i."_".time() . '.' . $file->getClientOriginalExtension();
					
					//public/uploads/hotels_gallery_images
					
                    //$file->move(public_path('uploads/hotels_banner_images/'),$gallery_name);
					
					$file->move(public_path('uploads/hotels_gallery_images/'),$gallery_name);
					
					
                    $gallery_images[]=$gallery_name;
					
					
					
					
					$hotel_image= Hotel_image_gallery::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gallery_name,
                    'is_deleted' => 0
                    ]);
					
					
					$i++;
					
					// $filename = time() . '.' . $request->licence->getClientOriginalExtension();
                    //$request->licence->move(storage_path('app/public/merchantUser/'), $filename);
				
                }
              }
			

        } else {
			
			
			
            if (isset($request->licence)) {
                $filename = time() . '.' . $request->licence->getClientOriginalExtension();
                $request->licence->move(storage_path('app/public/merchantUser/'), $filename);
            } else {
                $filename = NULL;
            }
            $merchant = Merchant::find(Auth::guard('merchant')->user()->id);
            $merchant->m_img = $filename;
            $merchant->save();
            $hotelData = Hotel::create([
                'name' => $request->hotel_name,
                'sub_heading' => 'NA',
                'location' => $request->address_address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'long' => $request->address_longitude,
                'lat' => $request->address_latitude,
                'primary_number' => $request->landline_number,
                'capacity' => 0,
                'added_by' => "MERCHANT",
                'if_is_merchant_id' => Auth::guard('merchant')->user()->id,
                'featured_image' => $featured_image,
                'description' => $request->description,
                'banner_img' => $banner_image,
                'summary' => $request->summary,
                'is_featured' => $request->is_featured,
                'is_deleted' => 0,
                'grade' => $request->grade
            ]);
            $hotel_id = $hotelData->id;
            DraftImages::truncate();  
			
			
			
			 if($galleries=$request->file('gallery'))
			   {
				   $i=1;
                foreach($galleries as $file)
				 {
                    //$name=$file->getClientOriginalName();
					
					 $gallery_name = "hotel_".$i."_".time() . '.' . $file->getClientOriginalExtension();
					
					//public/uploads/hotels_gallery_images
					
					
					
                    $file->move(public_path('uploads/hotels_gallery_images/'),$gallery_name);
                    $gallery_images[]=$gallery_name;
					
					
					
					
					$hotel_image= Hotel_image_gallery::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gallery_name,
                    'is_deleted' => 0
                    ]);
					
					
					$i++;
					
					// $filename = time() . '.' . $request->licence->getClientOriginalExtension();
                    //$request->licence->move(storage_path('app/public/merchantUser/'), $filename);
				
                }
              }
			
			
        }
        $hotelId['id'] = $hotel_id;
        $hotelId['typeList'] = TypeAttribute::getAllApprovedTypeAttribute();
        $hotelId['eventList'] = EventType::getAllApprovedEventType();
        $hotelId['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        return $this->addMerchantVenueHotel($hotel_id);

    }

    public function getHotelList()
    {
        $Aid = Auth::guard('merchant')->user()->id;

        // dd($data);
        $re = Hotel::where('if_is_merchant_id', $Aid)->get();
        $hotelId = Hotel::select('id')
            ->where('if_is_merchant_id', $Aid)
            ->first();
        if (count($re) >= 1) {
            //hotel view
            return redirect('merchant/hotel/hotelMerchantView/' . $hotelId->id);
        } else {
            $data['userexit'] = Hotel::where('if_is_merchant_id', $Aid)->exists();

            $data["hotelListData"] = DB::table('hotels')
                ->select('hotels.id', 'hotels.name', 'added_by', 'sub_heading', 'location', 'country', 'state', 'city', 'lat', 'long', 'primary_number', 'capacity', 'featured_image', 'description', 'summary', 'hotels.status', 'is_featured', 'hotels.is_deleted', 'grade', 'cities.name as city_name')
                ->leftjoin('cities', 'city', '=', 'cities.id')
                ->where('hotels.is_deleted', 0)
                ->where('added_by', 'MERCHANT')
                ->where('if_is_merchant_id', $Aid)
                ->get();
            return redirect('merchant/hotel/add_hotel');
        }
    }

    public function addMerchantVenueHotel($id)
    {
        $hotelId['id'] = $id;
        $hotelId['typeList'] = TypeAttribute::getAllApprovedTypeAttribute();
        $hotelId['eventList'] = EventType::getAllApprovedEventType();
        $hotelId['facilityList'] = Facility::getAllApprovedFacility();
        $hotelId['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
    //    dd($hotelId);
        return view('merchant/HotelMerchant/add_hotel_merchant', $hotelId);
    }

    public function addMerchantIncludeHotel(Request $request)
    {
        $hotelId['id'] = $request->id;
        $hotelId['typeList'] = TypeAttribute::getAllApprovedTypeAttribute();
        $hotelId['eventList'] = EventType::getAllApprovedEventType();
        $hotelId['facilityList'] = Facility::getAllApprovedFacility();
        $hotelId['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        return view('merchant/HotelMerchant/add_hotel_merchant', $hotelId);
    }

    public function submitMerchantIncludeHotel(Request $request)
    {
        // dd($request);
		
		
		
		
        $featured_image = DB::table('draft_images')->select('image_name')->where('image_type','featured_image')->value('image_name');
        $gallery_image[] = DB::table('draft_images')->select('image_name')->where('image_type','gallery_image')->get();
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $event = implode(" ", $request->event_type);
		
		
        $this->validate(request(), [
            'hotelId' => 'required',
            'venue_name' => 'required',
           // 'venue_sub_title' => 'required',
           // 'venue_type' => 'required',
            //'include_type' => 'required',
            //'description' => 'required',
            //'cost' => 'required',
        ]);
		
	
		
		
        $id = $request['hotelId'];
		
		
		if($request->facilities !='')
		{
			$facilities=implode(',',$request->facilities);
		}
		else
		{
			$facilities='';
		}
	
        $hotel = HotelsSubEntity::create([
            'hotel_id' => $request['hotelId'],
            'title' => $request['venue_name'],
            'sub_title' => $request['venue_sub_title'],
            'type' => $request['venue_type'],
            'event_type' => $event,
            'status' => 'ACTIVE',
            'include_type' => $request['include_type'],
            'description' => $request['description'],
            'cost' => $request['cost'],
            'discount' => 0,
            'feature_image' =>  $featured_image,
            'facilities' => $facilities
        ]);
        $hotel_id = $hotel->id;
		
	
		
			// Hotel gallery images 
			
			 if($galleries=$request->file('gallery'))
			   {
				   
				   
				   $i=1;
                foreach($galleries as $file)
				 {
                    //$name=$file->getClientOriginalName();
					
					 $gallery_name = "hotel_".$i."_".time() . '.' . $file->getClientOriginalExtension();
					
					//public/uploads/hotels_gallery_images
					
                    $file->move(public_path('uploads/hotels_venue_images/'),$gallery_name);
                    $gallery_images[]=$gallery_name;
					
					
					
					
					$hotel_image= Hotel_image_venue::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gallery_name,
                    'is_deleted' => 0
                    ]);
					
					
					$i++;
					
					// $filename = time() . '.' . $request->licence->getClientOriginalExtension();
                    //$request->licence->move(storage_path('app/public/merchantUser/'), $filename);
				
                }
              }
			  
			  
        if (isset($hotel_id) && $hotel_id != '') {
            foreach ($gallery_image[0] as $gi) {
                Hotel_image_gallery::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gi->image_name,
                    'is_deleted' => 0
                ]);
            }
        }
        DraftImages::truncate();
        $venue_id = $hotel->id;
        $data['id'] = $venue_id;
        $data['hotels_sub_entity_id'] = $venue_id;
        $data['listSubEntity'] = HotelsSubEntity::find($venue_id);
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['inCapacityList'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($venue_id);
        $data['menuList'] = IncludeHotelMenu::getAllIncludeHotelMenuData($venue_id);
        foreach ($data['capacitykey'] as $i => $value) {
            $temp = 'capacity_id_' . $value->id;
            $max_capacity = 'maximum_capacity_' . $value->id;
            $sd_capacity = 'socialdistancing_capacity_' . $value->id;
            if ($request->$temp == 'on') {
                $isExists = IncludeHotelCapacity::where('capacity_attribute_id', $value->id)->where('hotels_sub_entity_id', $venue_id)->first();
                if ($isExists) {
                    $isExists->capacity_value = $request->$max_capacity;
                    $isExists->socialdistancing_capacity = $request->$sd_capacity;
                    $isExists->save();
                } else {
                    $c_attribute = new includeHotelCapacity();
                    $c_attribute->hotels_sub_entity_id = $venue_id;
                    $c_attribute->capacity_attribute_id = $value->id;
                    $c_attribute->capacity_value = $request->$max_capacity;
                    $c_attribute->socialdistancing_capacity = $request->$sd_capacity;
                    $c_attribute->save();
                }
            }
        }
        return redirect()->route('merchant/hotel/hotelMerchantIncludeView', array('id' => $venue_id));
        exit;
        // return redirect('/merchant/hotel/hotelMerchantVenue/')->with('success','Hotel Sub Entity added successfully');
    }

    public function getMerchantHotelEditForm($id)
    {
        $data['hotelMerchantData'] = Hotel::find($id); $data['City'] = City::getAllApprovedCity();
       
        $data['Countri'] = Country::getAllApprovedCountry();
        $data['State'] = State::getAllApprovedState();

        $data['gallery_images'] = Hotel_image_venue::getImagesByUsingHotelId($id);
		
		

        /* dd($data['hotelMerchantData']);*/
        return view('merchant/HotelMerchant/edit_hotel_merchant', $data);
    }

    public function getHotelMerchantEditInclude($id)
    {
        // dd($id);
        $data['hotelSubEntity'] = HotelsSubEntity::find($id);
        $data['typeList'] = TypeAttribute::getAllApprovedTypeAttribute();
        $data['eventList'] = EventType::getAllApprovedEventType();
        $data['facilityList'] = Facility::getAllApprovedFacility();
        $event = explode(" ", $data['hotelSubEntity']->event_type);
        $data['selectedEvent'] = $event;
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['capacityvalue'] = IncludeHotelCapacity::where('hotels_sub_entity_id', $id)->get();
        //$data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
		
		 $data['gallery_images'] = Hotel_image_venue::getImagesByUsingHotelId($id);
		 
		 
        // dd($data);
        return view('merchant/HotelMerchant/edit_hotel_include_merchant', $data);
    }

    public function statusChange(Request $request)
    {
        // dd($request);
        $data['delete'] = HotelsSubEntity::find($request->id);
        if ($data['delete']) {
            $data['delete']->status = $request->status;
            $data['delete']->save();
        }

        return $this->getHotelMerchantVenue($id);
    }

    public function merchantUpdateAddForm(Request $request)
    {
        /*dd($data['request']);*/
        $id = $request['id'];
        $this->validate(request(), [
            'hotel_name' => 'required',
            'sub_heading' => 'required',
            'location' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone_number' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'status' => 'required',
            'is_featured' => 'required',
            'grade' => 'required',
        ]);

        $hotelMerchant = Hotel::find($id);

        if (!empty($request['featured_image'])) {
            $filename = time() . '.' . $request['featured_image']->getClientOriginalExtension();
            $request['featured_image']->move(storage_path('app/public/hotelsFeaturedImages/'), $filename);
            if ($hotelMerchant->featured_image != NULL) {
                @unlink(storage_path('app/public/hotelsFeaturedImages/' . $hotelMerchant->featured_image));
            }
        } else {
            $filename = $hotelMerchant->featured_image;
        }

        if (!empty($request['banner_img'])) {
            $filename = time() . '.' . $request['banner_img']->getClientOriginalExtension();
            $request['banner_img']->move(storage_path('app/public/hotelsBannerImages/'), $filename);
            if ($hotelMerchant->banner_img != NULL) {
                @unlink(storage_path('app/public/hotelsBannerImages/' . $hotelMerchant->banner_img));
            }
        } else {
            $filename = $hotelMerchant->banner_img;
        }

        $hotelMerchant['name'] = $request->hotel_name;
        $hotelMerchant['sub_heading'] = $request->sub_heading;
        $hotelMerchant['location'] = $request->location;
        $hotelMerchant['country'] = $request->country;
        $hotelMerchant['state'] = $request->state;
        $hotelMerchant['city'] = $request->city;
        $hotelMerchant['long'] = $request->longitude;
        $hotelMerchant['lat'] = $request->latitude;
        $hotelMerchant['primary_number'] = $request->phone_number;
        $hotelMerchant['capacity'] = $request->capacity;
        $hotelMerchant['added_by'] = "MERCHANT";
        $hotelMerchant['if_is_merchant_id'] = Auth::guard('merchant')->user()->id;
        $hotelMerchant['featured_image'] = $filename;
        $hotelMerchant['banner_img'] = 0;
        $hotelMerchant['description'] = $request->description;
        $hotelMerchant['summary'] = $request->summary;
        $hotelMerchant['status'] = $request->status;
        $hotelMerchant['is_featured'] = $request->is_featured;
        $hotelMerchant['is_deleted'] = 0;
        $hotelMerchant['grade'] = $request->grade;
        $hotelMerchant->save();

        return redirect('merchant/hotelMerchantList')->with('success', ' Updated Successfully');
    }

    public function getHotelMerchantView($id)
    {

        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id', $id)->count();
        $data['hotel_id'] = $id;
        $data['key'] = KeyAttribute::getAllApprovedKeyAttribute();
        $data['hotelKey'] = HotelKeyAttribute::getAllHotelKeyAttribute($id);
        $data['HotelInclude'] = DB::table('hotels_sub_entity')
            ->select('hotels_sub_entity.id', 'hotel_id', 'title', 'sub_title', 'status', 'type_attributes.name as type_name')
            ->leftjoin('type_attributes', 'type', '=', 'type_attributes.id')
            ->where('hotel_id', $id)
            ->get();
        $data['City'] = City::getAllApprovedCity();
        $data['Countri'] = Country::getAllApprovedCountry();
        $data['State'] = State::getAllApprovedState();
        $data['Merchant'] = Merchant::find(Auth::guard('merchant')->user()->id);
        $data['Hotel'] = HotelsSubEntity::find(Auth::guard('merchant')->user()->id);
        $data['featured'] = 1;
        $data['banner'] = 2;
		
		$data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
		
		

        //    dd($data);
        return view('merchant/HotelMerchant/add_hotel', $data);
    }

    public function getHotelMerchantVenue()
    {
        $Aid = Auth::guard('merchant')->user()->id;
        $hotel = Hotel::where('if_is_merchant_id', $Aid)->first();
        if (!empty($hotel)) {
            $id = $hotel->id;
            $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
            $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
            $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id', $id)->count();
            $data['hotel_id'] = $id;
            $data['key'] = KeyAttribute::getAllApprovedKeyAttribute();
            $data['hotelKey'] = HotelKeyAttribute::getAllHotelKeyAttribute($id);
            $data['HotelInclude'] = DB::table('hotels_sub_entity')
                ->select('hotels_sub_entity.id', 'hotel_id', 'title', 'sub_title', 'status', 'type_attributes.name as type_name')
                ->leftjoin('type_attributes', 'type', '=', 'type_attributes.id')
                ->where('hotel_id', $id)
                ->where('hotels_sub_entity.is_deleted', 0)
                ->get();
            return view('merchant/HotelVenue/hotelMerchantVenue', $data);
        } else {
            return redirect('merchant/hotel/add_hotel');
        }
    }

    /*public function submitHotelsMerchant(Request $request){

        $this->validate(request(), [
           'hotelId'=> 'required',
           'hotel_title'=> 'required',
           'sub_title'=> 'required',
           'type'=> 'required',
           'status'=> 'required',
           'description'=> 'required',
           'featured_img'=> 'required'
        ]);


       if(isset($request['featured_img'])){
           $filename = time().'.'.$request['featured_img']->getClientOriginalExtension();
           $request['featured_img']->move(storage_path('app/public/hotels_sub_entity/'),$filename);
       }else{
           $filename = NULL;
       }

       $id=$request['hotelId'];
       $hotel=HotelsSubEntity::create([
           'hotel_id'=> $request['hotelId'],
           'title'=> $request['hotel_title'],
           'sub_title'=> $request['sub_title'],
           'type'=> $request['type'],
           'status'=> $request['status'],
           'description'=> $request['description'],
           'feature_image'=> $filename
       ]);

       return redirect('/merchant/hotel/hotelMerchantView/'.$id)->with('success','Hotel Sub Entity added successfully');
   }*/


    /**/
    public function getHotelKeyMerchant($id)
    {

        $data['hotel_id'] = $id;
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id', $id)->count();

        $data['key'] = KeyAttribute::getAllApprovedKeyAttribute();
        $data['hotelKey'] = HotelKeyAttribute::getAllHotelKeyAttribute($id);

        return view('merchant/HotelMerchant/keyFactMerchant', $data);
    }

    public function submitHotelKeyMerchant(Request $request)
    {

        //dd(count($request['key_attribute_id']) .'ff'. count($request['description']));
        $dataArr = [];

        if (count($request['key_attribute_id']) == count($request['description'])) {
            for ($i = 0; $i < count($request['key_attribute_id']); $i++) {
                $dataArr[] = [
                    'key_attribute_id' => $request['key_attribute_id'][$i],
                    'hotel_id' => $request['hotel_id'],
                    'description' => $request['description'][$i],
                    'is_deleted' => 0
                ];

            }
        }

        foreach ($dataArr as $value) {
            HotelKeyAttribute::create([
                'key_attribute_ids' => $value['key_attribute_id'],
                'hotel_id' => $value['hotel_id'],
                'description' => $value['description'],
                'is_deleted' => $value['is_deleted']
            ]);
        }

        return back()->with('success', 'Key Fact Added Successfully');
    }

    public function kfEditMerchant(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $id = $request->id;
        //dd($id);
        $html = '';
        $data['hotelKey'] = HotelKeyAttribute::find($id);
        $data['key'] = KeyAttribute::getAllApprovedKeyAttribute();

        if (isset($request['id'])) {
            $costate = '';
            foreach ($data['key'] as $item) :
                $selected = '';
                if ($item->id != '' && $data['hotelKey']->key_attribute_ids == $item->id) {
                    $selected = 'selected';
                }
                $costate .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->title . '</option>';
            endforeach;
        }
        //dd($data['hotelKey']);
        $html .= '
            <div class="row" id="editData">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="hotel_id" value="' . $hotel_id . '">

              <div class="form-group validated col-md-6">
                <label class="form-control-label" for="key_attribute_id">Title</label>
                <select id="key_attribute_id" class="form-control" name="key_attribute_id" required="">
                <option value="">Select</option>
                ' . $costate . '
                  </select>
              </div>
              <div class="form-group col-md-6" id="website_input">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" id="exampleTextarea" name="description" rows="2">' . $data['hotelKey']->description . '</textarea>
              </div>
            </div>

            <div class="form-group">
             <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
        ';

        return response()->json(['html' => $html], 200);
    }

    public function saveKfEditMerchant(Request $request)
    {
        //dd($request);

        $id = (isset($request['id']) && $request['id'] != '') ? $request['id'] : NULL;
        $hotel_id = (isset($request['hotel_id']) && $request['hotel_id'] != '') ? $request['hotel_id'] : NULL;
        $key_attribute_id = (isset($request['key_attribute_id']) && $request['key_attribute_id'] != '') ? $request['key_attribute_id'] : NULL;
        $description = (isset($request['description']) && $request['description'] != '') ? $request['description'] : NULL;

        //dd($id, $hotel_id, $key_attribute_id, $description);
        $keyFact = HotelKeyAttribute::where('id', $id)
            ->where('hotel_id', $hotel_id)
            ->update([
                'key_attribute_ids' => $key_attribute_id,
                'description' => $description
            ]);

        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function getHotelCapacityMerchant($id)
    {
        $data['hotel_id'] = $id;
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id', $id)->count();
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['capacityList'] = HotelCapacityAttribute::getAllHotelCapacityAttribute($id);

        return view('merchant/HotelMerchant/capacityMerchant', $data);
    }

    public function submitHotelCapacityMerchant(Request $request)
    {

        $capData = [];
        if (count($request['capacity_attribute_id']) == count($request['capacity_value'])) {
            for ($i = 0; $i < count($request['capacity_attribute_id']); $i++) {
                $capData[] = [
                    'capacity_attribute_id' => $request['capacity_attribute_id'][$i],
                    'hotel_id' => $request['hotel_id'],
                    'hotel_sub_entity_id' => $request['hotel_sub_entity_id'],
                    'capacity_value' => $request['capacity_value'][$i],
                    'is_deleted' => 0
                ];

            }
        }

        foreach ($capData as $value) {
            HotelCapacityAttribute::create([
                'capacity_attribute_id' => $value['capacity_attribute_id'],
                'hotel_id' => $value['hotel_id'],
                'hotel_sub_entity_id' => $value['hotel_sub_entity_id'],
                'capacity_value' => $value['capacity_value'],
                'is_deleted' => $value['is_deleted']
            ]);
        }

        return back()->with('success', 'Key Fact Added Successfully');
    }

    public function capacityEditMerchant(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $id = $request->id;
        //dd($id);
        $html = '';

        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['capacityList'] = HotelCapacityAttribute::find($id);

        if (isset($request['id'])) {
            $costate = '';
            foreach ($data['capacitykey'] as $item) :
                $selected = '';
                if ($item->id != '' && $data['capacityList']->capacity_attribute_id == $item->id) {
                    $selected = 'selected';
                }
                $costate .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->title . '</option>';
            endforeach;
        }
        //dd($data['capacityList']);
        $html .= '
            <div class="row" id="editData">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="hotel_id" value="' . $hotel_id . '">

              <div class="form-group validated col-md-6">
                <label class="form-control-label" for="capacity_attribute_id">Title</label>
                <select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id" required="">
                <option value="">Select</option>
                ' . $costate . '
                  </select>
              </div>
              <div class="form-group col-md-6" id="website_input">
                <label for="exampleTextarea">Capacity Value</label>
                <input type="number" class="form-control"  name="capacity_value" value="' . $data['capacityList']->capacity_value . '" rows="2">
              </div>
            </div>

            <div class="form-group">
             <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
        ';

        return response()->json(['html' => $html], 200);
    }

    public function saveCapacityEditMerchant(Request $request)
    {
        //dd($request);

        $id = (isset($request['id']) && $request['id'] != '') ? $request['id'] : NULL;
        $hotel_id = (isset($request['hotel_id']) && $request['hotel_id'] != '') ? $request['hotel_id'] : NULL;
        $capacity_attribute_id = (isset($request['capacity_attribute_id']) && $request['capacity_attribute_id'] != '') ? $request['capacity_attribute_id'] : NULL;
        $capacity_value = (isset($request['capacity_value']) && $request['capacity_value'] != '') ? $request['capacity_value'] : NULL;

        //dd($id, $hotel_id, $capacity_attribute_id, $capacity_value);
        $keyFact = HotelCapacityAttribute::where('id', $id)
            ->where('hotel_id', $hotel_id)
            ->update([
                'capacity_attribute_id' => $capacity_attribute_id,
                'capacity_value' => $capacity_value
            ]);

        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function getHotelfeaturedMerchant($id)
    {
        $data['hotel_id'] = $id;
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id', $id)->count();
        $hotel_feature_attribute = DB::table('hotel_feature_attribute')->where('hotel_id', $id)->get();
        $data['hotel_feature_attribute'] = array();
        //dd($data['hotel_feature_attribute']);
        if (!empty($hotel_feature_attribute)) {
            foreach ($hotel_feature_attribute as $value) {
                $data['hotel_feature_attribute'][] = $value->feature_attribute_id;
            }
        }
        //dd($data['hotel_feature_attribute']);
        $data['featureList'] = FeatureAttribute::getAllApprovedFeatureAttribute();

        $data['featureList'] = DB::table('feature_attributes')
            ->select('feature_attributes.id', 'hotel_feature_attribute.description', 'feature_attributes.title')
            ->leftjoin('hotel_feature_attribute', 'feature_attributes.id', '=', 'hotel_feature_attribute.feature_attribute_id')
            ->get();
        /*            dd($data['featureList']);
        */
        return view('merchant/HotelMerchant/featuredMerchant', $data);
    }

    public function submitHotelfeaturedMerchant(Request $request)
    {
        $id = $request['hotel_id'];
        $fData = [];

        if (HotelFeatureAttribute::where('hotel_id', $id)->exists()) {
            HotelFeatureAttribute::where('hotel_id', $id)->delete();
        }
        /*
                if(($request['feature_attribute_id']) && ($request['checkbox'])){
                    for($i = 0 ; $i < count($request['feature_attribute_id']) ; $i++){
                        $fData[] = [
                                        'feature_attribute_id'=>$request['feature_attribute_id'][$i],
                                        'hotel_id' => $request['hotel_id'],
                                        'checkbox'=> (isset($request['checkbox'][$i])) ? $request['checkbox'][$i] : false,
                                        'is_deleted'=>0
                                    ] ;

                        }

                }*/
        if (($request['feature_attribute_id'])) {
            for ($i = 0; $i < count($request['feature_attribute_id']); $i++) {
                if ($request['checkbox_' . $i] == NULL) {
                    $checkbox = false;
                } else {
                    $checkbox = true;
                }
                $fData[] = [
                    'feature_attribute_id' => $request['feature_attribute_id'][$i],
                    'hotel_id' => $request['hotel_id'],
                    'checkbox' => $checkbox,
                    'is_deleted' => 0,
                ];

                $checkbox = '';
            }

        }

        foreach ($fData as $value) {
            HotelFeatureAttribute::create([
                'feature_attribute_id' => $value['feature_attribute_id'],
                'hotel_id' => $value['hotel_id'],
                'description' => $value['checkbox'],
                'is_deleted' => $value['is_deleted']
            ]);
        }
        return redirect('/merchant/hotel/hotelMerchantView/' . $id)->with('success', 'Feature added successfully');
    }


    public function updateHotelsIncludeMerchant(Request $request)
    {
        // dd($request);
        $id = $request['id'];
        $hotelId = $request['hotel_id'];
        $venuepresent = HotelsSubEntity::where('id', $id)->first();
        // dd($venuepresent);
        $featured_image = DB::table('draft_images')->select('image_name')->where('image_type','featured_image')->value('image_name');
        $gallery_image[]=DB::table('draft_images')->select('image_name')->where('image_type','gallery_image')->get();
        $this->validate(request(), [
            'hotel_id' => 'required',
            'venue_name' => 'required',
            'venue_sub_title' => 'required',
            'type' => 'required',
            'event_type' => 'required',
            'include_type' => 'required',
            'description' => 'required',
        ]);
        $hotelInclude = HotelsSubEntity::find($id);
        $hotelInclude['hotel_id'] = $request->hotel_id;
        $hotelInclude['title'] = $request->venue_name;
        $hotelInclude['sub_title'] = $request->venue_sub_title;
        $hotelInclude['type'] = $request->type;
		
		if($request->facilities !='')
		{	
        $hotelInclude['facilities'] = implode(',',$request->facilities);
		}
		else
		{
			$hotelInclude['facilities'] ="";
		}
		
        $hotelInclude['event_type'] = $request->event_type;
        if($featured_image)
        {
        $hotelInclude['feature_image'] = $featured_image;
        }
        else
        {
        $hotelInclude['feature_image'] = $venuepresent->feature_image;
        }
        $hotelInclude['include_type'] = $request->include_type;
        $hotelInclude['description'] = $request->description;
        $hotelInclude['status'] = 'ACTIVE';
        $hotelInclude->save();
        $hotel_id = $hotelInclude->id;
        /*if (isset($hotel_id) && $hotel_id != '') {
            foreach ($gallery_image[0] as $gi) {
                Hotel_image_gallery::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gi->image_name,
                    'is_deleted' => 0
                ]);
            } 
        }
        DraftImages::truncate();
		*/
		
		// Hotel gallery images 
			
			 if($galleries=$request->file('gallery'))
			   {
				   
				   
				   $i=1;
                foreach($galleries as $file)
				 {
                    //$name=$file->getClientOriginalName();
					
					 $gallery_name = "hotel_".$i."_".time() . '.' . $file->getClientOriginalExtension();
					
					//public/uploads/hotels_gallery_images
					
                    $file->move(public_path('uploads/hotels_venue_images/'),$gallery_name);
                    $gallery_images[]=$gallery_name;
					
					
					
					
					$hotel_image= Hotel_image_venue::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gallery_name,
                    'is_deleted' => 0
                    ]);
					
					
					$i++;
					
					// $filename = time() . '.' . $request->licence->getClientOriginalExtension();
                    //$request->licence->move(storage_path('app/public/merchantUser/'), $filename);
				
                }
              }
			  
        return $this->getHotelMerchantVenue($hotelId);
        // return redirect('/merchant/hotel/hotelMerchantVenue/' . $hotelId)->with('success', 'Hotel Sub Entity Updated Successfully');
    }

    public function editHotelsGalleryDataMerchant(Request $request)
    {

        $hotel_id = $request['id'];
        $this->validate(request(), [
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        //$hotelData = Hotel::find($hotel_id);

        $gallery_images = array();
        if ($files = $request->file('gallery_images')) {
            $i = 0;
            foreach ($files as $file) {
                $extn = $file->getClientOriginalExtension();
                $filename = time() . $i . '.' . $extn;
                $file->move(storage_path('app/public/hotelsGalleryImages/'), $filename);
                $gallery_images[] = $filename;
                $i++;
            }
        }

        //$hotel_id = $hotelData->id;
        if (isset($hotel_id) && $hotel_id != '') {
            foreach ($gallery_images as $gi) {
                // dd($gi);
                Hotel_image_gallery::create([
                    'hotel_id' => $hotel_id,
                    'hotel_sub_entity_id' => 0,
                    'order' => 0,
                    'description' => 'none',
                    'image' => $gi,
                    'is_deleted' => 0
                ]);
            }
        }
        return back()->with('success', 'Gallery Added Successfully');
    }

    public function deleteHotelsGalleryMerchant($id)
    {

        $gallery = Hotel_image_gallery::find($id);
        if ($gallery) {
            if (isset($gallery->image)) {
                @unlink(storage_path('app/public/hotelsGalleryImages/' . $gallery->image));
            }
            $gallery->delete();
            $data['status'] = 200;
            $data['message'] = 'Deleted Successfully';
            return response()->json($data, 200);
        }
        $data['status'] = 200;
        $data['message'] = 'Already Deleted';
        return response()->json($data, 200);
    }


    public function hotelMerchantIncludeView($id)
    {
        $data['hotels_sub_entity_id'] = $id;
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['inCapacityList'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        $data['menuList'] = IncludeHotelMenu::getAllIncludeHotelMenuData($id);
        // dd($data);
        return view('merchant/HotelMerchant/add_capacity', $data);
    }

    public function hotelMerchantIncludeList($id)
    {

        $data['hotels_sub_entity_id'] = $id;
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['inCapacityList'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        $data['menuList'] = IncludeHotelMenu::getAllIncludeHotelMenuData($id);
        $venue = HotelsSubEntity::find($id);
        $data['venueName'] = $venue->title;
        return view('merchant/HotelMerchant/list_menu', $data);
    }

    public function hotelMerchantIncludeVenue($id)
    {
        $data['hotels_sub_entity_id'] = $id;
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['inCapacityList'] = IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        return view('merchant/HotelVenue/hotelMerchantSingleVenue', $data);
    }


    public function submitMerchantHotelsIncludeCapacity(Request $request)
    {
        //  $isvenuepresent = IncludeHotelCapacity::where('capacity_attribute_id',$request['capacity_attribute_id'])->where('hotels_sub_entity_id',$request['hotels_sub_entity_id'])->first();
        // dd($isvenuepresent);
        // dd($request);
        $capData = [];
        if (count($request['capacity_attribute_id']) == count($request['capacity_value'])) {
            for ($i = 0; $i < count($request['capacity_attribute_id']); $i++) {
                $capData[] = [
                    'capacity_attribute_id' => $request['capacity_attribute_id'][$i],
                    'hotels_sub_entity_id' => $request['hotels_sub_entity_id'],
                    'capacity_value' => $request['capacity_value'][$i],
                    'is_deleted' => 0
                ];

            }
        }
        foreach ($capData as $value) {
            $id = $value['capacity_attribute_id'];
            $menu = IncludeHotelCapacity::create([
                'capacity_attribute_id' => $value['capacity_attribute_id'],
                'hotels_sub_entity_id' => $value['hotels_sub_entity_id'],
                'capacity_value' => $value['capacity_value'],
                'is_deleted' => $value['is_deleted']
            ]);
        }
        $menu_id = $menu->hotels_sub_entity_id;
        $data['id'] = $menu_id;
        $data['hotels_sub_entity_id'] = $id;
        $data['menuList'] = IncludeHotelMenu::getAllIncludeHotelMenuData($id);
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        // return $this->getHotelSingleViewMenu($menu_id);
        // dd($data);
        return back()->with('success', 'added capacity Added Successfully');

    }

    public function editMerchantFormHotelsIncludeCapacity(Request $request)
    {
        $id = $request->id;

        $html = '';

        $data['capacitykey'] = CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['capacityList'] = IncludeHotelCapacity::find($id);

        if (isset($request['id'])) {
            $option = '';
            foreach ($data['capacitykey'] as $item) :
                $selected = '';
                if ($item->id != '' && $data['capacityList']->capacity_attribute_id == $item->id) {
                    $selected = 'selected';
                }
                $option .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->title . '</option>';
            endforeach;
        }
        //dd($data['capacityList']);
        $html .= '
            <div class="row" id="editData">
                <input type="hidden" name="id" value="' . $id . '">

              <div class="form-group validated col-md-6">
                <label class="form-control-label" for="capacity_attribute_id">Title</label>
                <select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id" required="">
                <option value="">Select</option>
                ' . $option . '
                  </select>
              </div>
              <div class="form-group col-md-6" id="website_input">
                <label for="exampleTextarea">Capacity Value</label>
                <input type="number" class="form-control"  name="capacity_value" value="' . $data['capacityList']->capacity_value . '" rows="2">
              </div>
            </div>

            <div class="form-group">
             <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
        ';

        return response()->json(['html' => $html], 200);
    }

    public function submitMerchantEditFormHotelsIncludeCapacity(Request $request)
    {
        //dd($request);

        $id = (isset($request['id']) && $request['id'] != '') ? $request['id'] : NULL;
        $capacity_attribute_id = (isset($request['capacity_attribute_id']) && $request['capacity_attribute_id'] != '') ? $request['capacity_attribute_id'] : NULL;
        $capacity_value = (isset($request['capacity_value']) && $request['capacity_value'] != '') ? $request['capacity_value'] : NULL;

        //dd($id, $hotel_id, $capacity_attribute_id, $capacity_value);
        $keyFact = IncludeHotelCapacity::where('id', $id)
            ->update([
                'capacity_attribute_id' => $capacity_attribute_id,
                'capacity_value' => $capacity_value
            ]);

        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function deleteMerchantHotelsIncludeCapacity(Request $request)
    {
        $data = IncludeHotelCapacity::find($request['id']);
        $data['is_deleted'] = 1;
        $data->save();
        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function getHotelSingleViewMenu($id)
    {
        $data['hotels_sub_entity_id'] = $id;
        $data['menuList'] = IncludeHotelMenu::getAllIncludeHotelMenuData($id);
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        dd($data);
        return view('merchant.HotelMerchant.add_menu', $data);
    }


    public function submitIncludeMenuMerchant(Request $request)
    {

        $capData = [];
//        dd($capData , $request);
        if (count($request['title']) == count($request['image'])) {
            for ($i = 0; $i < count($request['title']); $i++) {
                if (isset($request['image'][$i])) {
                    $imageMenu = time() . '.' . $request['image'][$i]->getClientOriginalExtension();
                    $request['image'][$i]->move(storage_path('app/public/hotels_sub_entity_menu/'), $imageMenu);
                } else {
                    $imageMenu = NULL;
                }

                if (isset($request['doc_file'][$i])) {
                    $document = time() . '.' . $request['doc_file'][$i]->getClientOriginalExtension();
                    $request['doc_file'][$i]->move(storage_path('app/public/hotels_sub_entity_menu/'), $document);
                } else {
                    $document = NULL;
                }
                $capData[] = [
                    'hotels_sub_entity_id' => $request['hotels_sub_entity_id'],
                    'category' => $request['category_title'],
                    'cost' => $request['cost'],
                    'discount' => $request['discount'],
                    'title' => $request['title'][$i],
                    'image' => $imageMenu,
                    'doc_file' => $document,
                    'is_deleted' => 0
                ];

            }
        }

        foreach ($capData as $i=>$value) {
//            dd($value);
            IncludeHotelMenu::create([
                'hotels_sub_entity_id' => $value['hotels_sub_entity_id'],
                'category_title' => $value['category'],
                'title' => $value['title'],
                'cost' => $value['cost'][$i],
                'discount' => $value['discount'][$i],
                'image' => $value['image'],
                'doc_file' => $value['doc_file'],
                'is_deleted' => $value['is_deleted'],

            ]);
        }
        return back()->with('success', 'Added Menu Successfully');
    }

    public function editFormHotelsIncludeMenu(Request $request)
    {
        $id = $request->id;

        $html = '';
        $data['menu'] = IncludeHotelMenu::find($id);


        $html .= '
            <div class="row" id="editData">
                <input type="hidden" name="id" value="' . $id . '">
              <div class="form-group validated col-md-3">
                  <label class="form-control-label" for="capacity_attribute_id">Title</label>
                  <input type="text" placeholder="Enter title" class="form-control" id="exampleTextarea" name="title" value="' . $data['menu']->title . '">
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">Image</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="image" value="' . $data['menu']->image . '">
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">File</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="doc_file" value="' . $data['menu']->doc_file . '" accept=".doc">
                </div>
                <div class="form-group">
                 <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
                 <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               </div>
           </div>


        ';

        return response()->json(['html' => $html], 200);
    }

    public function submitFormHotelsIncludeMenu(Request $request)
    {
        $id = $request['id'];
        $menuUpdate = IncludeHotelMenu::where('id', $id);

        if (!empty($request['image'])) {
            $imageFile = time() . '.' . $request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/hotels_sub_entity_menu/'), $imageFile);
            if ($menuUpdate->image != NULL) {
                @unlink(storage_path('app/public/hotels_sub_entity_menu/' . $menuUpdate->image));
            }
        } else {
            $imageFile = $menuUpdate->image;
        }

        if (!empty($request['doc_file'])) {
            $doc_file = time() . '.' . $request['doc_file']->getClientOriginalExtension();
            $request['doc_file']->move(storage_path('app/public/hotels_sub_entity_menu/'), $doc_file);
            if ($menuUpdate->doc_file != NULL) {
                @unlink(storage_path('app/public/hotels_sub_entity_menu/' . $menuUpdate->doc_file));
            }
        } else {
            $doc_file = $menuUpdate->doc_file;
        }

        $menuUpdate['title'] = $request['title'];
        $menuUpdate['image'] = $image;
        $menuUpdate['doc_file'] = $doc_file;
        $menuUpdate->save();
        return response()->json(['message' => 'Saved successfully'], 200);
    }
	


    public function deleteAdminHotelsIncludeMemu(Request $request)
    {
        $data = IncludeHotelMenu::find($request['id']);
        $data['is_deleted'] = 1;
        $data->save();
        return response()->json(['message' => 'Saved successfully'], 200);
    }
    public function verify($mail, $token)
    {
        $merchant = Merchant::where('email', $mail)->first();
        if ($merchant->email_token == $token) {
            $merchant->is_active = 1;
        }
        $merchant->save();
        return redirect('merchant/hotel/add_hotel');
    }

    public function deleteVenue($id) {
        $venue = HotelsSubEntity::find($id);
        $venue->is_deleted = 1;
        $venue->save();
        return $this->getHotelMerchantVenue();
    }

    public function deleteMenu($id, $hotelId) {
        $menu = IncludeHotelMenu::find($id);
        $menu->is_deleted = 1;
        $menu->save();
        return $this->hotelMerchantIncludeList($hotelId);
    }

    public function editMenu($id, $hotelId) {
        $menu = IncludeHotelMenu::find($id);
//        dd($menu);
//        return $this->hotelMerchantIncludeList($menu);
        return view('merchant.HotelMerchant.edit_menu', $menu);
    }

    public function bookingCalendar() {
        $hotel = Hotel::where('if_is_merchant_id', Auth::guard('merchant')->user()->id)->first();
        $data['venues'] = HotelsSubEntity::where('hotel_id', $hotel->id)->where('is_deleted', 0)->get();
        $data['bookings'] = Booking::where('hotel_id', $hotel->id)->get();
        return view('merchant.HotelMerchant.booking_calendar', $data);
    }


   public function booking_ajax_update (Request $request)
   {
	   
	   $booking = Booking::find($request->booking_id);
        $hotel = Hotel::where('if_is_merchant_id', Auth::guard('merchant')->user()->id)->first();
        $hotelId = $hotel->id;
        
        
        $booking->start_time = $request->start_date . ' ' . $request->start_time;
        $booking->end_time = $request->start_date . ' ' . $request->end_time;
        $booking->event_title = $request->event_title;
        $booking->is_booked = $request->is_booked;
        $booking->save();
        $bookings = Booking::where('hotel_id', $hotel->id)->get();
        return response()->json(['bookings' => $bookings]);
		
		
   }
   
   
      public function booking_ajax_delete (Request $request)
   {
	   
	   $booking = Booking::find($request->booking_id);
        $hotel = Hotel::where('if_is_merchant_id', Auth::guard('merchant')->user()->id)->first();
        $hotelId = $hotel->id;
        
        
        $booking->delete();
        $bookings = Booking::where('hotel_id', $hotel->id)->get();
        return response()->json(['bookings' => $bookings]);
		
		
   }
   
   
    public function ajaxUpdate(Request $request)
    {
        $booking = Booking::find($request->appointment_id);
        $hotel = Hotel::where('if_is_merchant_id', Auth::guard('merchant')->user()->id)->first();
        $hotelId = $hotel->id;
        if($booking) {

        } else {
            $booking = new booking();
        }
        
		  
		$start_date=date('Y-m-d', strtotime($request->date));
		
		
        $booking->hotel_id = $hotelId;
        $booking->venue_id = $request->venue_id;
        $booking->start_time = $start_date. ' ' . $request->start_time;
        $booking->end_time = $start_date . ' ' . $request->finish_time;
        $booking->event_title = $request->event_title;
        $booking->is_booked = $request->is_booked;
        $booking->save();
        $bookings = Booking::where('hotel_id', $hotel->id)->get();
        return response()->json(['bookings' => $bookings]);
    }
	
	public function getbookingCalendar(Request $request)
	{
		 $booking_id=$request->id;
		 
		 
		 $booking = Booking::find($booking_id);
		 
		 $booking['start_date']=date('Y-m-d',strtotime($booking->start_time));
		 
		$booking['start_time']=date('H:i:s',strtotime($booking->start_time));
		
		$booking['end_time']=date('H:i:s',strtotime($booking->end_time));
		
		
		
		 
		 
		 $booking= json_encode($booking);

		 
		 return $booking;
	}
}
