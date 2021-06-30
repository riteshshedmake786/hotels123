<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Supplier;
use App\Merchant;
use App\HotelsSubEntity;
use App\Hotel;
use App\Hotel_image_gallery;
use Illuminate\Http\Request;
use App\City;
use App\Countri;
use App\State;
use DB;
class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->hotel = new Hotel();
        $this->merchant = new Merchant();
        $this->supplier = new Supplier();
        $this->hotelsSubEntity = new HotelsSubEntity();
    }


    public function adminDashboard(){
        $data['hotelCount'] = $this->hotel->getAllHotelCount();
        $data['merchantCount'] = $this->merchant->getAllMerchantCount();
        $data['supplierCount'] = $this->supplier->getAllSupplierCount();
        $data['hotelsSubEntityCount'] = $this->hotelsSubEntity->getAllHotelsSubEntityCount();
        //dd($data['merchantCount']);
       return view('admin/home',$data);
    }

    public function getAllSupplier()
    {
        $data['supplierData']= Supplier::getAllSupplier();
        return view('admin/supplier/supplierList',$data);
    }
    public function getAllMerchant()
    {
        $data['merchantData']= Merchant::getAllMerchant();
        $data['hotel'] = Hotel::getAllHotel();
        // dd($data);
        return view('admin/Merchant/merchantList',$data);
    }
    public function SupplierSingleView($id)
    {
        $data['supplier']=Supplier::where('id',$id)->first();
        return view('admin/supplier/supplierView',$data);
    }
    public function MerchantSingleView($id)
    {
        $data['merchant']=Merchant::where('id',$id)->first();
        $data["hotelListData"]=DB::table('hotels')

                            ->select('hotels.id','hotels.name','added_by','sub_heading','location','country','state','city','lat','long','primary_number','capacity','featured_image','description','summary','hotels.status','is_featured','hotels.is_deleted', 'hotels.if_is_merchant_id','grade', 'cities.name as city_name')
                            ->leftjoin('cities','city','=','cities.id')
                            ->where('hotels.is_deleted',0)
                            ->where('hotels.if_is_merchant_id', $id)
                            ->get();
        //dd($data["hotelListData"]);

        return view('admin/Merchant/merchantView' ,$data);
    }
    public function statusChange(Request $request)
    {
        // dd($request->id);
        $hotel_id = Hotel::where('id',$request->id)->first();
        // dd($id,  $hotel_id);
        $data['delete'] = Hotel::find($hotel_id->id);
        
        if($data['delete']) {
            $data['delete']->is_deleted = $request->is_deleted;
            $data['delete']->status = $request->status;
            $data['delete']->save();
        }
       
        return $this->getAllMerchant($id);
    }
    public function statusChangeSupplier(Request $request)
    {
        // dd($request->id);
        $data['Supplierdelete'] = Supplier::find($request->id);
        if($data['Supplierdelete']) {
            $data['Supplierdelete']->status = $request->status;
            $data['Supplierdelete']->save();
        }
       
       
        return $this->getAllSupplier($id);
    }
    public function Cities()
    {
        return view('admin/Hotels/cities');
    }
    public function States()
    {
        return view('admin/Hotels/states');
    }
    public function Countries()
    {
        return view('admin/Hotels/countries');
    }

     public function getHotelView()
    {
        $data["hotelListData"]=DB::table('hotels')
                                ->select('hotels.name','by','sub_heading','location','country','state','city','lat','long','primary_number','capacity','featured_image','description','summary','hotels.status','is_featured','hotels.is_deleted','grade', 'cities.name as city_name')
                                ->leftjoin('cities','city','=','cities.id')
                                ->get();
                                        // dd($data);
        return view('admin/Hotel/hotelList',$data);
    }


    public function addHotels(){

        $data['City']=City::get();
        $data['Countri']=Countri::get();
        $data['State']=State::get();
        return view('admin/Hotels/add_hotels', $data);
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
            'description' => 'required',
            'summary' => 'required',
            'status' => 'required',
            'by'=>'required',
            'is_featured' => 'required',
        ]);
         if ($request->hasfile('featured_image')){
            $file=$request->file('featured_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(storage_path('app/public/hotelsFeaturedImages/'),$filename);
            $featured_image=$filename;
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
          Hotel::create([
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
                        'by'=>$request->by,
                        'featured_image'=>$featured_image,
                        'description'=>$request->description,
                        'summary'=>$request->summary,
                        'status'=>$request->status,
                        'is_featured'=>$request->is_featured,
                        'is_deleted'=>0,
                        'grade'=>0
                        ]);
          $id=Hotel::select('id')
                ->where('name',$request->hotel_name)
                ->where('sub_heading',$request->sub_heading)
                ->where('location',$request->location)
                ->where('city',$request->city)
                ->where('long',$request->longitude)
                ->where('lat',$request->latitude)
                ->where('summary',$request->summary)->first();

        // $id=1;

        foreach($gallery_images as $gi){
            // dd($gi);
            Hotel_image_gallery::create([
                'hotel_id'=>$id['id'],
                'hotel_sub_entity_id'=>0,
                'order'=>0,
                'description'=>'none',
                'image'=>$gi,
                'is_deleted'=>0
                ]);
        }
          return redirect('admin/hotelList');

    }

    public function AddHotelsIncludes()
    {
        return view('admin/Hotels/add_hotels_includes');
    }
    

    
    

}
