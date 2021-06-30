<?php

namespace App\Http\Controllers\AdminAuth;

use App\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function viewAllFacilities() {
        $data['eventType'] = Facility::all();
        return view('admin.Hotel.facilities',$data);
    }
    public function addFacilities(Request $request){
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if(isset($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/eventTypeImg/'),$filename);
        }else{
            $filename = NULL;
        }

        $eventType = Facility::create([
            'title' => $request['title'],
            'image' => $filename,
        ]);
        return redirect('admin/facilities');
    }
    public function editFacilities(int $id){
        $data = Facility::find($id);
        return response()->json($data, 200);
    }
    public function updateFacilities(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $eventType = Facility::find($id);

        //add image in storage folder
        if(!empty($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/EventTypeImg/'),$filename);
            if($eventType->image != NULL){
                @unlink(storage_path('app/public/EventTypeImg/'.$eventType->image));
            }
        }else{
            $filename = $eventType->image;
        }

        $eventType->title = $request['title'];
        $eventType->image =  $filename;
        $eventType->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $eventType->save();
        return redirect('admin/facilities');
    }
    public function deleteEventType(int $id){
        $eventType = Facility::find($id);
        if(isset($eventType->image)){
            @unlink(storage_path('app/public/EventTypeImg/'.$eventType->image));
        }
        $eventType->delete();
        return redirect('admin/facilities');
    }


}
