<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Merchant;
use App\Hotel;
use App\EventType;
use App\Hotel_image_gallery;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\KeyAttribute;
use App\Model\HotelKeyAttribute;
use App\Model\CapacityAttribute;
use App\Model\HotelCapacityAttribute;
use App\Model\IncludeHotelCapacity;
use App\Model\IncludeHotelMenu;
use App\Model\FeatureAttribute;
use App\Model\HotelFeatureAttribute;
use App\Model\TypeAttribute;
use App\HotelsSubEntity;
use DB;

class HotelController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    

    public function getHotelView()
    {
        $aid=Auth::guard('admin')->user()->id;
        $data["hotelListData"]=DB::table('hotels')

                                ->select('hotels.id','hotels.name','added_by','sub_heading','location','country','state','city','lat','long','primary_number','capacity','featured_image','banner_img','description','summary','hotels.status','is_featured','hotels.is_deleted','grade', 'cities.name as city_name')
                                ->leftjoin('cities','city','=','cities.id')
                                ->where('hotels.is_deleted',0)
                                ->get();
                                        // dd($data);
        return view('admin/Hotel/hotelList',$data);
    }
     public function addHotels(){

        $data['City']= City::getAllApprovedCity();
        $data['Countri']= Country::getAllApprovedCountry();
        $data['State']= State::getAllApprovedState();
        return view('admin/Hotel/add_hotels', $data);
    }

    public function addHotelsData(Request $request){
            
          $this->validate(request(), [

            'hotel_name' => 'required',
            'sub_heading' => 'required',
            'location' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            // 'level' => 'required',
            'phone_number' => 'required',
            'capacity' => 'required',
            'gallery_images.*' => 'required|image|mimes:jpeg,png,jpg',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg',
            'banner_img' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required',
            'summary' => 'required',
            'status' => 'required',
            'grade'=>'required',
            'is_featured' => 'required',
        ]);
         if ($request->hasfile('featured_image')){
            $file=$request->file('featured_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(storage_path('app/public/hotelsFeaturedImages/'),$filename);
            $featured_image=$filename;
        }
        if ($request->hasfile('banner_img')){
            $file=$request->file('banner_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(storage_path('app/public/hotelsBannerImages/'),$filename);
            $banner_img=$filename;
        }

      
        $gallery_images=array();
        if($files=$request->file('gallery_images')){
            $i=0;
            foreach($files as $file){
                $extn=$file->getClientOriginalExtension();
                $filename=time().$i.'.'.$extn;
                $file->move(storage_path('app/public/hotelsGalleryImages/'),$filename);
                $gallery_images[]=$filename;
                $i++;
            }
        }
         // $g_images=implode($gallery_images, ',');
          // dd($g_images);
        $hotelData = Hotel::create([
                        'name'=> $request->hotel_name,
                        'sub_heading'=> $request->sub_heading,
                        'location'=>$request->location,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'long'=>$request->longitude,
                        'lat'=>$request->latitude,
                        'primary_number'=>$request->phone_number,
                        'capacity'=>$request->capacity,
                        // 'gallery_images'=>$gallery_images,
                        'added_by'=>"ADMIN",
                        'if_is_admin_id'=>Auth::guard('admin')->user()->id,
                        'featured_image'=>$featured_image,
                        'banner_img'=>$banner_img,
                        'description'=>$request->description,
                        'summary'=>$request->summary,
                        'status'=>$request->status,
                        'is_featured'=>$request->is_featured,
                        'is_deleted'=>0,
                        'grade'=>$request->grade
                        ]);
       
          // $id=Hotel::select('id')
          //       ->where('name',$request->hotel_name)
          //       ->where('sub_heading',$request->sub_heading)
          //       ->where('location',$request->location)
          //       ->where('city',$request->city)
          //       ->where('long',$request->longitude)
          //       ->where('lat',$request->latitude)
          //       ->where('summary',$request->summary)->first();

        // $id=1;
        $hotel_id = $hotelData->id;
        if (isset($hotel_id) && $hotel_id != '') {
            foreach($gallery_images as $gi){
                // dd($gi);
                Hotel_image_gallery::create([
                    'hotel_id'=> $hotel_id ,
                    'hotel_sub_entity_id'=>0,
                    'order'=>0,
                    'description'=>'none',
                    'image'=>$gi,
                    'is_deleted'=>0
                    ]);
            }
        }
        
          return redirect('admin/hotel/hotelList');

    }

     public function getHotelSingleView($id)
    {
       $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
       $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
       $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id',$id)->count();
       
       $data['hotels_sub_entity'] = DB::table('hotels_sub_entity')
                                ->select('hotels_sub_entity.id','hotel_id','title','sub_title','status','type_attributes.name as type_name')
                                ->leftjoin('type_attributes','type','=','type_attributes.id')
                                ->where('hotel_id',$id)
                                ->get();

        //dd($data);
        return view('admin/Hotel/hotelView' ,$data);
    }

    public function submitHotelsInclude(Request $request){

         $this->validate(request(), [
            'hotelId'=> 'required',
            'hotel_title'=> 'required',
            'sub_title'=> 'required',
            'type'=> 'required',
            'event_type'=> 'required',
            'status'=> 'required',
            'include_type'=> 'required',
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
            'event_type'=> $request['event_type'],
            'status'=> $request['status'],
            'include_type'=> $request['include_type'],
            'description'=> $request['description'],
            'feature_image'=> $filename
        ]);

        return redirect('/admin/hotel/hotelView/'.$id)->with('success','Hotel Sub Entity added successfully');
    } 


    public function getHotelSingleViewKey($id)
    {   
        $data['hotel_id']=$id;
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['key'] =KeyAttribute::getAllApprovedKeyAttribute();
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id',$id)->count();


        $data['hotelKey'] = HotelKeyAttribute::getAllHotelKeyAttribute($id);
        return view('admin/Hotel/keyFact',$data);
    }

    public function addHotelKeyFactForm(Request $request){
            
        //dd(count($request['key_attribute_id']) .'ff'. count($request['description']));
        $dataArr = [];

        if(count($request['key_attribute_id']) == count($request['description'])){
            for($i = 0 ; $i < count($request['key_attribute_id']) ; $i++){
                $dataArr[] = [  
                                'key_attribute_id'=>$request['key_attribute_id'][$i],
                                'hotel_id' => $request['hotel_id'],
                                'description'=>$request['description'][$i],
                                'is_deleted'=>0
                            ] ;
                
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
        
        return back()->with('success','Key Fact Added Successfully');
    }

    public function kfEdit(Request $request){
        $hotel_id = $request->hotel_id;
        $id = $request->id;
        //dd($id);
        $html='';
        $data['hotelKey'] = HotelKeyAttribute::find($id);
        $data['key'] =KeyAttribute::getAllApprovedKeyAttribute();

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
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="hotel_id" value="'.$hotel_id.'">

              <div class="form-group validated col-md-6">
                <label class="form-control-label" for="key_attribute_id">Title</label>
                <select id="key_attribute_id" class="form-control" name="key_attribute_id" required="">
                <option value="">Select</option>
                ' . $costate . '
                  </select>
              </div>
              <div class="form-group col-md-6" id="website_input">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" id="exampleTextarea" name="description" rows="2">'.$data['hotelKey']->description.'</textarea>
              </div>
            </div>

            <div class="form-group">
             <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
        ';

        return response()->json(['html' => $html], 200);
    }

    public function saveKfEdit(Request $request){
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

     public function getHotelSingleViewCapacity($id)
    {   
        $data['hotel_id'] =$id;
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id',$id)->count();
        $data['capacitykey'] =CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['capacityList'] = HotelCapacityAttribute::getAllHotelCapacityAttribute($id);
        
        return view('admin/Hotel/capacity',$data);
    }

    public function addSubmitCapacity(Request $request)
    {

        $capData = [];
        if(count($request['capacity_attribute_id']) == count($request['capacity_value'])){
            for($i = 0 ; $i < count($request['capacity_attribute_id']) ; $i++){
                $capData[] = [  
                                'capacity_attribute_id'=>$request['capacity_attribute_id'][$i],
                                'hotel_id' => $request['hotel_id'],
                                'hotel_sub_entity_id' => $request['hotel_sub_entity_id'],
                                'capacity_value'=>$request['capacity_value'][$i],
                                'is_deleted'=>0
                            ] ;
                
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
        
        return back()->with('success','Key Fact Added Successfully');
    }

    public function capacityEdit(Request $request){
        $hotel_id = $request->hotel_id;
        $id = $request->id;
        //dd($id);
        $html='';

        $data['capacitykey'] =CapacityAttribute::getAllApprovedCapacityAttribute();
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
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="hotel_id" value="'.$hotel_id.'">

              <div class="form-group validated col-md-6">
                <label class="form-control-label" for="capacity_attribute_id">Title</label>
                <select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id" required="">
                <option value="">Select</option>
                ' . $costate . '
                  </select>
              </div>
              <div class="form-group col-md-6" id="website_input">
                <label for="exampleTextarea">Capacity Value</label>
                <input type="number" class="form-control"  name="capacity_value" value="'.$data['capacityList']->capacity_value.'" rows="2">
              </div>
            </div>

            <div class="form-group">
             <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
        ';

        return response()->json(['html' => $html], 200);
    }

    public function saveCapacityEdit(Request $request){
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

     public function getHotelSingleViewFeatured($id)
    {

        $data['hotel_id'] = $id;
        $data['hotelsData'] = Hotel::getHotelViewByHotelId($id);
        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);
        $data['inclued_count'] = DB::table('hotels_sub_entity')->where('hotel_id',$id)->count();
        $data['featureList'] = FeatureAttribute::getAllApprovedFeatureAttribute();
        $data['hotelFeatureList'] = HotelFeatureAttribute::getAllHotelFeatureAttributeById($id);

        $data['featureList']=DB::table('feature_attributes')
                ->select('feature_attributes.id', 'hotel_feature_attribute.description','feature_attributes.title')
                ->leftjoin('hotel_feature_attribute', 'feature_attributes.id','=', 'hotel_feature_attribute.feature_attribute_id')
                ->get();
        
        return view('admin/Hotel/featured',$data);
    }

   public function submitFeatureForm(Request $request){
        // $request['checkbox_1'];
        $id=$request['hotel_id'];
        $fData = [];

        if(HotelFeatureAttribute::where('hotel_id', $id )->exists()){
            HotelFeatureAttribute::where('hotel_id',$id)->delete();
        }

        if(($request['feature_attribute_id'])){
            for($i = 0 ; $i < count($request['feature_attribute_id']) ; $i++){
                                if($request['checkbox_'.$i]==NULL){
                                    $checkbox=false;
                                }
                                else{
                                    $checkbox=true;
                                }
                $fData[] = [  
                                'feature_attribute_id'=>$request['feature_attribute_id'][$i],
                                'hotel_id' => $request['hotel_id'],
                                'checkbox'=> $checkbox,
                                'is_deleted'=>0,
                            ] ;
                
                $checkbox='';
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
        return redirect('/admin/hotel/featured/'.$id)->with('success','Feature added successfully');
    }

    public function getHotelEditForm($id)
    {
        $data['hotelData'] = Hotel::find($id);
         $data['City']= City::getAllApprovedCity();
        $data['Countri']= Country::getAllApprovedCountry();
        $data['State']= State::getAllApprovedState();

        $data['gallery_images'] = Hotel_image_gallery::getImagesByUsingHotelId($id);

       // dd($data['hotelData']);
        return view('admin/Hotel/edit_hotel',$data);
    }
    public function getHotelEditFormInclude($id)
    {
        $data['hotelSubEntity'] = HotelsSubEntity::find($id);
        $data['typeList'] = TypeAttribute::getAllApprovedTypeAttribute();
        $data['eventList'] =EventType::getAllApprovedEventType();

        //dd($id);
        return view('admin/Hotel/edit_hotel_include',$data);
    }
    public function updateAddForm(Request $request){
       
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
            // 'level' => 'required',
            'phone_number' => 'required',
            'capacity' => 'required',
            //'gallery_images.*' => 'required|image|mimes:jpeg,png,jpg',
            //'featured_image' => 'required|image|mimes:jpeg,png,jpg',
            //'banner_img' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required',
            'summary' => 'required',
            'status' => 'required',
            'grade'=>'required',
            'is_featured' => 'required',
        ]);

         $hotelAdmin = Hotel::find($id); 

          if(!empty($request['featured_image'])){
            $filename = time().'.'.$request['featured_image']->getClientOriginalExtension();
            $request['featured_image']->move(storage_path('app/public/hotelsFeaturedImages/'),$filename);
            if($hotelAdmin->featured_image != NULL){
                @unlink(storage_path('app/public/hotelsFeaturedImages/'.$hotelAdmin->featured_image));
            }
        }else{
            $filename = $hotelAdmin->featured_image;
        }

        if(!empty($request['banner_img'])){
            $filename = time().'.'.$request['banner_img']->getClientOriginalExtension();
            $request['banner_img']->move(storage_path('app/public/hotelsBannerImages/'),$filename);
            if($hotelAdmin->banner_img != NULL){
                @unlink(storage_path('app/public/hotelsBannerImages/'.$hotelAdmin->banner_img));
            }
        }else{
            $filename = $hotelAdmin->banner_img;
        }

        $hotelAdmin['name'] = $request->hotel_name;
        $hotelAdmin['sub_heading'] =  $request->sub_heading;
        $hotelAdmin['location'] = $request->location;
        $hotelAdmin['country'] = $request->country;
        $hotelAdmin['state'] = $request->state;
        $hotelAdmin['city'] = $request->city;
        $hotelAdmin['long'] = $request->longitude;
        $hotelAdmin['lat'] = $request->latitude;
        $hotelAdmin['primary_number'] = $request->phone_number;
        $hotelAdmin['capacity'] = $request->capacity;
        $hotelAdmin['added_by'] = "ADMIN";
        $hotelAdmin['if_is_admin_id'] = Auth::guard('admin')->user()->id;
        $hotelAdmin['featured_image'] = $filename;
        $hotelAdmin['banner_img'] = $filename;
        $hotelAdmin['description'] = $request->description;
        $hotelAdmin['summary'] = $request->summary;
        $hotelAdmin['status'] = $request->status;
        $hotelAdmin['is_featured'] = $request->is_featured;
        $hotelAdmin['is_deleted'] = 0;
        $hotelAdmin['grade'] = $request->grade;
                   
        $hotelAdmin->save();
        return redirect('admin/hotel/hotelList')->with('success',' Updated Successfully');
    }
    public function AddHotelsIncludes($id)
    {
        $hotelId['id']=$id;
        $hotelId['typeList'] = TypeAttribute::getAllApprovedTypeAttribute();
        $hotelId['eventList'] =EventType::getAllApprovedEventType();
        return view('admin/Hotel/add_hotels_includes', $hotelId);
    }

    public function updateHotelsInclude(Request $request){

        //dd($request);
         $this->validate(request(), [
            'hotel_id'=> 'required',
            'title'=> 'required',
            'sub_title'=> 'required',
            'type'=> 'required',
            'event_type'=> 'required',
            'status'=> 'required',
            'include_type'=> 'required',
            'description'=> 'required',
         ]);

        $id=$request['id'];
        $hotelId=$request['hotel_id'];

         $hotelInclude = HotelsSubEntity::find($id); 
         if(!empty($request['feature_image'])){
            $filename = time().'.'.$request['feature_image']->getClientOriginalExtension();
            $request['feature_image']->move(storage_path('app/public/hotels_sub_entity/'),$filename);
            if($hotelInclude->feature_image != NULL){
                @unlink(storage_path('app/public/hotels_sub_entity/'.$hotelInclude->feature_image));
            }
        }else{
            $filename = $hotelInclude->feature_image;
        }

        $hotelInclude['hotel_id'] = $request->hotel_id;
        $hotelInclude['title'] =  $request->title;
        $hotelInclude['sub_title'] = $request->sub_title;
        $hotelInclude['type'] = $request->type;
        $hotelInclude['event_type'] = $request->event_type;
        $hotelInclude['feature_image'] = $filename;
        $hotelInclude['include_type'] = $request->include_type;
        $hotelInclude['description'] = $request->description;
        $hotelInclude['status'] = $request->status;
                   
        $hotelInclude->save();

        return redirect('/admin/hotel/hotelView/'.$hotelId)->with('success','Hotel Sub Entity Updated successfully');
    } 
   

    public function editHotelsGalleryData(Request $request){
       
        $hotel_id = $request['id'];
        $this->validate(request(), [
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        //$hotelData = Hotel::find($hotel_id); 
        
        $gallery_images=array();
        if($files=$request->file('gallery_images')){
            $i=0;
            foreach($files as $file){
                $extn=$file->getClientOriginalExtension();
                $filename=time().$i.'.'.$extn;
                $file->move(storage_path('app/public/hotelsGalleryImages/'),$filename);
                $gallery_images[]=$filename;
                $i++;
            }
        }
         //$hotel_id = $hotelData->id;
        if (isset($hotel_id) && $hotel_id != '') {
            foreach($gallery_images as $gi){
                // dd($gi);
                Hotel_image_gallery::create([
                    'hotel_id'=> $hotel_id ,
                    'hotel_sub_entity_id'=>0,
                    'order'=>0,
                    'description'=>'none',
                    'image'=>$gi,
                    'is_deleted'=>0
                    ]);
            }
        }
        return back()->with('success','Gallery Added Successfully');
    }

    public function deleteHotelsGallery($id){

        $gallery = Hotel_image_gallery::find($id);
        if($gallery){
            if(isset($gallery->image)){
                @unlink(storage_path('app/public/hotelsGalleryImages/'.$gallery->image));
            }
            $gallery->delete();
            $data['status'] = 200 ;
            $data['message'] = 'Deleted Successfully';
            return response()->json($data, 200);
        }
        $data['status'] = 200 ;
        $data['message'] = 'Already Deleted';
        return response()->json($data, 200);
    }


    public function getHotelSingleViewPage($id)
    {   
        $data['hotels_sub_entity_id']=$id;
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        $data['capacitykey'] =CapacityAttribute::getAllApprovedCapacityAttribute();
        $data['inCapacityList']= IncludeHotelCapacity::getAllIncludeHotelCapacityData($id);
        return view('admin/Hotel/hotelSingleView',$data);
    }

    public function submitHotelsIncludeCapacity(Request $request){
        $capData = [];

        if(count($request['capacity_attribute_id']) == count($request['capacity_value'])){
            for($i = 0 ; $i < count($request['capacity_attribute_id']) ; $i++){
                $capData[] = [  
                                'capacity_attribute_id'=>$request['capacity_attribute_id'][$i],
                                'hotels_sub_entity_id' => $request['hotels_sub_entity_id'],
                                'capacity_value'=>$request['capacity_value'][$i],
                                'is_deleted'=>0
                            ] ;
                
            }
        }
        
        foreach ($capData as $value) {
            IncludeHotelCapacity::create([
                'capacity_attribute_id' => $value['capacity_attribute_id'],
                'hotels_sub_entity_id' => $value['hotels_sub_entity_id'],
                'capacity_value' => $value['capacity_value'],
                'is_deleted' => $value['is_deleted']
                ]);
        }
        
        return back()->with('success','added capacity Added Successfully');
    }
    
    public function editFormHotelsIncludeCapacity(Request $request){
        $id = $request->id;

        $html='';

        $data['capacitykey'] =CapacityAttribute::getAllApprovedCapacityAttribute();
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
                <input type="hidden" name="id" value="'.$id.'">

              <div class="form-group validated col-md-6">
                <label class="form-control-label" for="capacity_attribute_id">Title</label>
                <select id="capacity_attribute_id" class="form-control" name="capacity_attribute_id" required="">
                <option value="">Select</option>
                ' . $option . '
                  </select>
              </div>
              <div class="form-group col-md-6" id="website_input">
                <label for="exampleTextarea">Capacity Value</label>
                <input type="number" class="form-control"  name="capacity_value" value="'.$data['capacityList']->capacity_value.'" rows="2">
              </div>
            </div>

            <div class="form-group">
             <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
        ';

        return response()->json(['html' => $html], 200);
    }

    public function submitEditFormHotelsIncludeCapacity(Request $request){
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

     
    public function deleteAdminHotelsIncludeCapacity(Request $request){
        $data=IncludeHotelCapacity::find($request['id']);
        $data['is_deleted'] = 1;
        $data->save();
        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function getHotelSingleViewMenu($id)
    {
        $data['hotels_sub_entity_id']=$id;
        $data['menuList'] = IncludeHotelMenu::getAllIncludeHotelMenuData($id);
        $data['listSubEntity'] = HotelsSubEntity::find($id);
        return view('admin/Hotel/menu',$data);
    }


    public function submitIncludeMenu(Request $request){
        $capData = [];

        if(count($request['title']) == count($request['image'])){

            for($i = 0 ; $i < count($request['title']) ; $i++){

                if(isset($request['image'][$i])){
                    $imageMenu = time().'.'.$request['image'][$i]->getClientOriginalExtension();
                    $request['image'][$i]->move(storage_path('app/public/hotels_sub_entity_menu/'),$imageMenu);
                }else{
                    $imageMenu = NULL;
                }

                if(isset($request['doc_file'][$i])){
                    $document = time().'.'.$request['doc_file'][$i]->getClientOriginalExtension();
                    $request['doc_file'][$i]->move(storage_path('app/public/hotels_sub_entity_menu/'),$document);
                }else{
                    $document = NULL;
                }
                $capData[] = [  
                                'hotels_sub_entity_id'=>$request['hotels_sub_entity_id'],
                                'title'=>$request['title'][$i],
                                'image' => $imageMenu,
                                'doc_file'=>$document,
                                'is_deleted'=>0
                            ] ;
                
            }
        }
        
        foreach ($capData as $value) {
            IncludeHotelMenu::create([
                'hotels_sub_entity_id' => $value['hotels_sub_entity_id'],
                'title' => $value['title'],
                'image' => $value['image'],
                'doc_file' => $value['doc_file'],
                'is_deleted' => $value['is_deleted']
                ]);
        }
        
        return back()->with('success','Added Menu Successfully');
    }

    public function editFormHotelsIncludeMenu(Request $request){
        $id = $request->id;

        $html='';
        $data['menu'] = IncludeHotelMenu::find($id);


        $html .= '
            <div class="row" id="editData">
                <input type="hidden" name="id" value="'.$id.'">

              <div class="form-group validated col-md-3">
                  <label class="form-control-label" for="capacity_attribute_id">Title</label>
                  <input type="text" placeholder="Enter title" class="form-control" id="exampleTextarea" name="title" value="'.$data['menu']->title.'">
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">Image</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="image" value="'.$data['menu']->image.'">
                </div>
                <div class="form-group col-md-4" id="website_input">
                  <label for="exampleTextarea">File</label>
                  <input type="file" class="form-control" id="exampleTextarea" name="doc_file" value="'.$data['menu']->doc_file.'" accept=".doc">
                </div>
                <div class="form-group">
                 <button type="Submit" class="btn btn-primary mr-2" id="saveEdit">Submit</button>
                 <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               </div>
           </div>


        ';

        return response()->json(['html' => $html], 200);
    }

    public function submitFormHotelsIncludeMenu(Request $request){
        $id= $request['id'];
        $menuUpdate = IncludeHotelMenu::where('id', $id);

        if(!empty($request['image'])){
            $imageFile = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/hotels_sub_entity_menu/'),$imageFile);
            if($menuUpdate->image != NULL){
                @unlink(storage_path('app/public/hotels_sub_entity_menu/'.$menuUpdate->image));
            }
        }else{
            $imageFile = $menuUpdate->image;
        }

        if(!empty($request['doc_file'])){
            $doc_file = time().'.'.$request['doc_file']->getClientOriginalExtension();
            $request['doc_file']->move(storage_path('app/public/hotels_sub_entity_menu/'),$doc_file);
            if($menuUpdate->doc_file != NULL){
                @unlink(storage_path('app/public/hotels_sub_entity_menu/'.$menuUpdate->doc_file));
            }
        }else{
            $doc_file = $menuUpdate->doc_file;
        }

         $menuUpdate['title'] = $request['title'];
         $menuUpdate['image'] = $image;
         $menuUpdate['doc_file'] = $doc_file;
         $menuUpdate->save();
        return response()->json(['message' => 'Saved successfully'], 200);
    }

    public function deleteAdminHotelsIncludeMemu(Request $request){
        $data=IncludeHotelMenu::find($request['id']);
        $data['is_deleted'] = 1;
        $data->save();
        return response()->json(['message' => 'Saved successfully'], 200);
    }
     public function AddHotelsEnquiry()
    {
        $data["hotelsEnquiryData"]=DB::table('hotels_enquiry')
                                ->select('hotels_enquiry.id','hotels_enquiry.first_name','last_name','mobile_no','event_type_id','message','event_type.title as event_type_name')
                                ->leftjoin('event_type','event_type_id','=','event_type.id')
                                ->orderBy('hotels_enquiry.id', 'DESC')
                                ->get();
        //dd($data["hotelsEnquiryData"]);

        return view('admin/HotelEnquiry/hotelEnquiryForm',$data);
    }
}
