<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\FeatureAttribute;

class FeatureAttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->featureAttribute =  new FeatureAttribute();
    }

    public function viewAllFeatureAttribute(){
        
        $data['featureAttribute'] = $this->featureAttribute->getAllFeatureAttribute();
        return view('admin.Hotels.feature_attributes',$data);
    }

    public function addFeatureAttribute(Request $request){
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //add image in storage folder
        if(isset($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/featureAttributeImg/'),$filename);
        }else{
            $filename = NULL;
        }

        $featureAttribute = FeatureAttribute::create([
            'title' => $request['title'],
            'image' => $filename,
        ]);
        return redirect('admin/feature_attributes');
    }

    public function editFeatureAttribute(int $id){
        $data = $this->featureAttribute->getFeatureAttributeByID($id);
        return response()->json($data, 200);
    }

    public function updateFeatureAttribute(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $featureAttribute = FeatureAttribute::find($id);

        //add image in storage folder
        if(!empty($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/featureAttributeImg/'),$filename);
            if($featureAttribute->image != NULL){
                @unlink(storage_path('app/public/featureAttributeImg/'.$featureAttribute->image));
            }
        }else{
            $filename = $featureAttribute->image;
        }

        $featureAttribute->title = $request['title'];
        $featureAttribute->image =  $filename;
        $featureAttribute->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $featureAttribute->save();
        return redirect('admin/feature_attributes');
    }

    public function deleteFeatureAttribute(int $id){
        $featureAttribute = FeatureAttribute::find($id);
        if(isset($featureAttribute->image)){
            @unlink(storage_path('app/public/featureAttributeImg/'.$featureAttribute->image));
        }
        $featureAttribute->delete();
        return redirect('admin/feature_attributes');
    }
}
