<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\CapacityAttribute;

class CapacityAttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->capacityAttribute =  new CapacityAttribute();
    }

    public function viewAllCapacityAttribute(){
        
        $data['capacityAttribute'] = $this->capacityAttribute->getAllCapacityAttribute();
        return view('admin.Hotels.capacity_attributes',$data);
    }

    public function addCapacityAttribute(Request $request){
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //add image in storage folder
        if(isset($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/capacityAttributeImg/'),$filename);
        }else{
            $filename = NULL;
        }

        $capacityAttribute = CapacityAttribute::create([
            'title' => $request['title'],
            'image' => $filename,
        ]);
        return redirect('admin/capacity_attributes');
    }

    public function editCapacityAttribute(int $id){
        $data = $this->capacityAttribute->getCapacityAttributeByID($id);
        return response()->json($data, 200);
    }

    public function updateCapacityAttribute(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $capacityAttribute = CapacityAttribute::find($id);

        //add image in storage folder
        if(!empty($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/capacityAttributeImg/'),$filename);
            if($capacityAttribute->image != NULL){
                @unlink(storage_path('app/public/capacityAttributeImg/'.$capacityAttribute->image));
            }
        }else{
            $filename = $capacityAttribute->image;
        }

        $capacityAttribute->title = $request['title'];
        $capacityAttribute->image =  $filename;
        $capacityAttribute->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $capacityAttribute->save();
        return redirect('admin/capacity_attributes');
    }

    public function deleteCapacityAttribute(int $id){
        $capacityAttribute = CapacityAttribute::find($id);
        if(isset($capacityAttribute->image)){
            @unlink(storage_path('app/public/capacityAttributeImg/'.$capacityAttribute->image));
        }
        $capacityAttribute->delete();
        return redirect('admin/capacity_attributes');
    }
}

