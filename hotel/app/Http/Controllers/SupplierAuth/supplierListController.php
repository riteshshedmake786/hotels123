<?php

namespace App\Http\Controllers\SupplierAuth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Supplier;
use App\SupplierProfile;
use App\Model\City;
use App\Model\Country;
use App\Model\State;
use DB;
use App\Hotel_image_gallery;
use App\Model\KeyAttribute;
use App\Model\TypeAttribute;
use App\SupplierProducts;
use App\SupplierImageGallery;
use App\DraftImages;
use App\SupplierType;

class supplierListController extends Controller
{
	public function __construct()
    {
        $this->middleware('supplier');
    }
    public function getSupplierList()
    {
        $Aid = Auth::guard('supplier')->user()->id;
        $re = SupplierProfile::where('if_is_supplier_id', $Aid)->get();
        $supplierId = SupplierProfile::select('id')
            ->where('if_is_supplier_id', $Aid)
            ->first();
        if (count($re) >= 1) {

            return redirect('supplier/hotelSupplierView/' . $supplierId->id);
        } else {
            $data['userexit'] = SupplierProfile::where('if_is_supplier_id', $Aid)->exists();

            $data["supplierListData"] = DB::table('supplier_profile')
                ->select('supplier_profile.id', 'supplier_profile.name', 'added_by', 'sub_heading', 'location', 'country', 'state', 'city', 'lat', 'long', 'primary_number', 'capacity', 'featured_image', 'description', 'summary', 'supplier_profile.status', 'is_featured', 'supplier_profile.is_deleted', 'grade', 'cities.name as city_name')
                ->leftjoin('cities', 'city', '=', 'cities.id')
                ->where('supplier_profile.is_deleted', 0)
                ->where('added_by', 'SUPPLIER')
                ->where('if_is_supplier_id', $Aid)
                ->get();
            return redirect('supplier/add_supplier');
        }
    }
    public function getHotelSupplierView($id)
    {
        $data['supplierData'] = SupplierProfile::getSupplierViewBySupplierId($id);
        $data['gallery_images'] = SupplierImageGallery::getImagesByUsingSupplierId($id);
        $data['supplier_id'] = $id;
        $data['key'] = KeyAttribute::getAllApprovedKeyAttribute();
        $data['City'] = City::getAllApprovedCity();
        $data['Country'] = Country::getAllApprovedCountry();
        $data['State'] = State::getAllApprovedState();
        $data['Supplier'] = Supplier::find(Auth::guard('supplier')->user()->id);
        $data['supplierType'] = SupplierType::get();
        
        return view('supplier/HotelSupplier/add_supplier', $data);
    }
    public function getSupplierAddForm()
    {
        $data['Supplier']= Supplier::find(Auth::guard('supplier')->user()->id);
        $data['City'] = City::getAllApprovedCity();
        $data['Country'] = Country::getAllApprovedCountry();
        $data['State'] = State::getAllApprovedState();
        $data['gallery_images'] = [];
        $data['supplierData'] = null;
        $data['supplierType'] = SupplierType::get();
        // dd($data);
       
        return view('supplier/HotelSupplier/add_supplier',$data);
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
    public function addSupplierData(Request $request)
    {
        // dd($request);
        $ispresent = SupplierProfile::where('if_is_supplier_id', Auth::guard('supplier')->user()->id)->first();
        // dd($ispresent);
        $isSupplierPresent = Supplier::find(Auth::guard('supplier')->user()->id);
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
        $gallery_image[] = DB::table('draft_images')->select('image_name')->where('image_type','gallery_image')->get();
        $this->validate(request(), [
            'supplier_name' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'is_featured' => 'required',
        ]);  
        if ($isSupplierPresent) {
            Supplier::where('id', $isSupplierPresent->id)->update([
                'company_name' => $request->supplier_name,
                'landline_no' => $request->landline_number,
                'mobile_no' => $request->mobile_number
                ]);
        }
        if ($ispresent) {
            $supplierData = SupplierProfile::where('id', $ispresent->id)->update([
                'name' => $request->supplier_name,
                'sub_heading' => 'NA',
                'location' => $request->address_address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'long' => $request->address_longitude,
                'lat' => $request->address_latitude,
                'primary_number' => $request->landline_number,
                'capacity' => 0,
                'added_by' => "SUPPLIER",
                'if_is_supplier_id' => Auth::guard('supplier')->user()->id,
                'featured_image' => $featured_image,
                'description' => $request->description,
                'banner_img' => $banner_image,
                'summary' => $request->summary,
                'is_featured' => $request->is_featured,
                'is_deleted' => 0,
                'services' => $request->services,
                'email' => $request->email,
                'supported_payment_method' => $request->payment_method,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'you_tube' => $request->youtube,
                'website' => $request->website,
                'brand' => $request->brand,
                'line_of_business' => $request->business,
            ]);  
            $supplier_id = $ispresent->id;
            if (isset($supplier_id) && $supplier_id != '') {
                foreach ($gallery_image[0] as $gi) {
                    SupplierImageGallery::create([
                        'supplier_id' => $supplier_id,
                        'supplier_product_id' => 0,
                        'order' => 0,
                        'description' => 'none',
                        'image' => $gi->image_name,
                        'is_deleted' => 0
                    ]);
                }
            }
            DraftImages::truncate();
        } else {
            if (isset($request->licence)) {
                $filename = time() . '.' . $request->licence->getClientOriginalExtension();
                $request->licence->move(storage_path('app/public/supplierUser/'), $filename);
            } else {
                $filename = NULL;
            }
            $supplier = Supplier::find(Auth::guard('supplier')->user()->id);
            $supplier->image = $filename;
            $supplier->save();
            $supplierData = SupplierProfile::create([
                'name' => $request->supplier_name,
                'sub_heading' => 'NA',
                'location' => $request->address_address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'long' => $request->address_longitude,
                'lat' => $request->address_latitude,
                'primary_number' => $request->landline_number,
                'capacity' => 0,
                'added_by' => "SUPPLIER",
                'if_is_supplier_id' => Auth::guard('supplier')->user()->id,
                'featured_image' => $featured_image,
                'description' => $request->description,
                'banner_img' => $banner_image,
                'summary' => $request->summary,
                'is_featured' => $request->is_featured,
                'is_deleted' => 0,
                'services' => $request->services,
                'email' => $request->email,
                'supported_payment_method' => $request->payment_method,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'you_tube' => $request->youtube,
                'website' => $request->website,
                'brand' => $request->brand,
                'line_of_business' => $request->business,
            ]);
            $supplier_id = $supplierData->id;
            if (isset($supplier_id) && $supplier_id != '') {
                foreach ($gallery_image[0] as $gi) {
                    SupplierImageGallery::create([
                        'supplier_id' => $supplier_id,
                        'supplier_product_id' => 0,
                        'order' => 0,
                        'description' => 'none',
                        'image' => $gi->image_name,
                        'is_deleted' => 0
                    ]);
                }
            }
            DraftImages::truncate();
        }
        return redirect('supplier/addnewSupplierProducts');
    }
    public function getSupplierProduct()
    {
        $re = SupplierProfile::where('if_is_supplier_id', Auth::guard('supplier')->user()->id)->first();
        $id = $re->id;
        $productId = SupplierProducts::select('id')->where('supplier_id', $id)->first();
           if($productId) 
           {
              return redirect('supplier/supplierProductView/' . $productId->id);
           } 
           else 
           {
            $data['userexit'] = SupplierProducts::where('supplier_id', $id)->exists();
            $data["productListData"] = DB::table('supplier_products')->select('*')->where('supplier_id', $re)->get();
        return redirect('supplier/add_products');
       }   
    }
    public function getSupplierProductView($id)
    {
        $data['productData'] = SupplierProducts::getProductViewBySupplierId($id);
        $data['product_id'] = $id;
        $data['key'] = KeyAttribute::getAllApprovedKeyAttribute();
        $data['Supplier'] = Supplier::find(Auth::guard('supplier')->user()->id);
        // dd($data);
        return view('supplier/HotelSupplier/add_products',$data);
    }
    public function getProductsAddForm(Request $request)
    {
        $Supplier = SupplierProfile::where('if_is_supplier_id', Auth::guard('supplier')->user()->id)->first();
        $id = SupplierProducts::where('supplier_id',$Supplier->id)->first();
        $data['product_id'] = $id;
        $data['productData'] = null;
        return view('supplier/HotelSupplier/add_products',$data);
    }
    public function addSupplierProductsData(Request $request)
    {
    //    dd($request);
        $supplierId = SupplierProfile::where('if_is_supplier_id', Auth::guard('supplier')->user()->id)->first();
        $id=$request->id;
        $productId = SupplierProducts::find($id);
        // dd( $productId);
        if($request->hasfile('fimage'))
        {
        $featured_image = DB::table('draft_images')->select('image_name')->where('image_type','featured_image')->value('image_name');
        }
        else
        {
        $featured_image = $productId->image;
        }
        if($productId) {
            SupplierProducts::where('id', $productId->id)->update([
                'supplier_id' => $supplierId->id,
                'products' => $request->product_name,
                'cost' => $request->product_cost,
                'discount_offer' => $request->discount,
                'image' => $featured_image,
                'category' => 'text',
                'description' => $request->description,
                'summary' => $request->summary,
                ]);
            DraftImages::truncate();
            }
        else
        {
        $productData = SupplierProducts::create([
            'supplier_id' => $supplierId->id,
            'products' => $request->product_name,
            'cost' => $request->product_cost,
            'discount_offer' => $request->discount,
            'image' => $featured_image,
            'category' => 'text',
            'description' => $request->description,
            'summary' => $request->summary,
        ]);
        DraftImages::truncate();
        }
        return redirect('supplier/supplierProductList');
    }
    public function getSupplierProductList()
    {
        $supplierId = SupplierProfile::where('if_is_supplier_id', Auth::guard('supplier')->user()->id)->first();
            $id = $supplierId->id;
            $data['product_id'] = $id;
            $data['supplierProducts'] = DB::table('supplier_products')->select('*')->where('supplier_id', $id)->get();
            return view('supplier/HotelSupplier/product_list', $data);  
          
    }
    public function editSupplierProducts($id)
    {
        $data['supplierProducts'] = SupplierProducts::find($id);
        return redirect('supplier/supplierProductView/' . $id);
    }
    public function deleteSupplierProducts($id)
    {
        DB::table('supplier_products')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'record deleted successfully.');
    }
    public function addNewSupplierProducts(Request $request)
    {
        return view('supplier/HotelSupplier/add_newproducts');
    }
    public function addNewSupplierProductsData(Request $request)
    {

        $request->validate([
            'product_name'=>'required',
            'product_cost'=>'required',
            'discount'=>'required',
            'filenames' => 'required',
            'filenames.*' => 'image',
            'description'=>'required',
            'summary'=>'required'
        ]);
        $files = [];
            if($request->hasfile('filenames'))
             {
                foreach($request->file('filenames') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('uploads/hotels_featured_images'), $name);  
                    $files[] = $name;  
                }
             }
        $featured_image = DB::table('draft_images')->select('image_name')->where('image_type','featured_image')->value('image_name');
        $supplierId = SupplierProfile::where('if_is_supplier_id', Auth::guard('supplier')->user()->id)->first();
        $productId = SupplierProducts::where('supplier_id',$supplierId->id)->first();
        $productData = SupplierProducts::create([
            'supplier_id' => $supplierId->id,
            'products' => $request->product_name,
            'cost' => $request->product_cost,
            'discount_offer' => $request->discount,
            'image' => implode(" ",$files),
            'category' => 'text',
            'description' => $request->description,
            'summary' => $request->summary
        ]);
        DraftImages::truncate();
        return redirect('supplier/supplierProductList');
    }
    public function statusChange(Request $request)
    {
        $data['status'] = SupplierProducts::find($request->id);
        if ($data['status']) {
            $data['status']->status = $request->status;
            $data['status']->save();
        }
        return $this->getHotelMerchantVenue($id);
    }
    public function imageDestroy($id,$supplier_id)
    {
        // dd($id);
    	SupplierImageGallery::find($id)->delete();
    	return $this->getHotelSupplierView($supplier_id);	
    }
  
   
}
