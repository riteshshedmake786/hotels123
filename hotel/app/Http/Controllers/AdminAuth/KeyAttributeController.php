<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\KeyAttribute;

class KeyAttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->keyAttribute =  new KeyAttribute();
    }

    public function viewAllKeyAttribute(){
        
        $data['keyAttribute'] = $this->keyAttribute->getAllKeyAttribute();
        return view('admin.Hotels.key_attributes',$data);
    }

    public function addKeyAttribute(Request $request){
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //add image in storage folder
        if(isset($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/keyAttributeImg/'),$filename);
        }else{
            $filename = NULL;
        }

        $keyAttribute = KeyAttribute::create([
            'title' => $request['title'],
            'image' => $filename,
        ]);
        return redirect('admin/key_attributes');
    }

    public function editKeyAttribute(int $id){
        $data = $this->keyAttribute->getKeyAttributeByID($id);
        return response()->json($data, 200);
    }

    public function updateKeyAttribute(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $keyAttribute = KeyAttribute::find($id);

        //add image in storage folder
        if(!empty($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/keyAttributeImg/'),$filename);
            if($keyAttribute->image != NULL){
                @unlink(storage_path('app/public/keyAttributeImg/'.$keyAttribute->image));
            }
        }else{
            $filename = $keyAttribute->image;
        }

        $keyAttribute->title = $request['title'];
        $keyAttribute->image =  $filename;
        $keyAttribute->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $keyAttribute->save();
        return redirect('admin/key_attributes');
    }

    public function deleteKeyAttribute(int $id){
        $keyAttribute = keyAttribute::find($id);
        if(isset($keyAttribute->image)){
            @unlink(storage_path('app/public/keyAttributeImg/'.$keyAttribute->image));
        }
        $keyAttribute->delete();
        return redirect('admin/key_attributes');
    }
}
