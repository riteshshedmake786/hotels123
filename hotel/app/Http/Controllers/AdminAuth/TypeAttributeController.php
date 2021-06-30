<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\TypeAttribute;

class TypeAttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->typeAttribute =  new TypeAttribute();
    }

    public function viewAllTypeAttribute(){
        
        $data['typeAttribute'] = $this->typeAttribute->getAllTypeAttribute();
        return view('admin.Hotels.type_attributes',$data);
    }

    public function addTypeAttribute(Request $request){
        $this->validate(request(), [
            'name' => 'required|max:255',
        ]);
        $typeAttribute = TypeAttribute::create([
            'name' => $request['name'],
        ]);
        return redirect('admin/type_attributes');
    }

    public function editTypeAttribute(int $id){
        $data = $this->typeAttribute->getTypeAttributeByID($id);
        return response()->json($data, 200);
    }

    public function updateTypeAttribute(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'name' => 'required|max:255',
        ]);

        $typeAttribute = TypeAttribute::find($id);
        $typeAttribute->name = $request['name'];
        $typeAttribute->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $typeAttribute->save();
        return redirect('admin/type_attributes');
    }

    public function deleteTypeAttribute(int $id){
        $typeAttribute = TypeAttribute::find($id);
        $typeAttribute->delete();
        return redirect('admin/type_attributes');
    }
}
