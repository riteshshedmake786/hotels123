<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SupplierType;

class SupplierTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->supplierType =  new SupplierType();
    }
    public function viewAllSupplierType(){
        
        $data['supplierType'] = $this->supplierType->getAllSupplierType();
        return view('admin.Hotels.supplier_type',$data);
    }
    public function addSupplierType(Request $request){
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //add image in storage folder
        if(isset($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/supplierTypeImg/'),$filename);
        }else{
            $filename = NULL;
        }

        $supplierType = SupplierType::create([
            'title' => $request['title'],
            'image' => $filename,
        ]);
        return redirect('admin/supplier_type');
    }
    public function editSupplierType(int $id){
        $data = $this->supplierType->getSupplierTypeByID($id);
        return response()->json($data, 200);
    }
    public function updateSupplierType(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $supplierType = SupplierType::find($id);

        //add image in storage folder
        if(!empty($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/supplierTypeImg/'),$filename);
            if($supplierType->image != NULL){
                @unlink(storage_path('app/public/supplierTypeImg/'.$supplierType->image));
            }
        }else{
            $filename = $supplierType->image;
        }

        $supplierType->title = $request['title'];
        $supplierType->image =  $filename;
        $supplierType->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $supplierType->save();
        return redirect('admin/supplier_type');
    }
    public function deleteEventType(int $id){
        $supplierType = SupplierType::find($id);
        if(isset($supplierType->image)){
            @unlink(storage_path('app/public/supplierTypeImg/'.$supplierType->image));
        }
        $supplierType->delete();
        return redirect('admin/supplier_type');
    }


}
