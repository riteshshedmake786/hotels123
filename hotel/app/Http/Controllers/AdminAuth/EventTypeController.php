<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventType;

class EventTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->eventType =  new EventType();
    }
    public function viewAllEventType(){
        
        $data['eventType'] = $this->eventType->getAllEventType();
        return view('admin.Hotels.event_type',$data);
    }
    public function addEventType(Request $request){
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //add image in storage folder
        if(isset($request['image'])){
            $filename = time().'.'.$request['image']->getClientOriginalExtension();
            $request['image']->move(storage_path('app/public/eventTypeImg/'),$filename);
        }else{
            $filename = NULL;
        }
		
		
		if(isset($request['indoor_image'])){
            $indoor_image = "Indoor_".time().'.'.$request['indoor_image']->getClientOriginalExtension();
            $request['indoor_image']->move(storage_path('app/public/eventTypeImg/'),$indoor_image);
        }else{
            $indoor_image = NULL;
        }
		
		if(isset($request['outdoor_image'])){
            $outdoor_image = "Outdoor_".time().'.'.$request['outdoor_image']->getClientOriginalExtension();
            $request['outdoor_image']->move(storage_path('app/public/eventTypeImg/'),$outdoor_image);
        }else{
            $outdoor_image = NULL;
        }




        $eventType = EventType::create([
            'title' => $request['title'],
			'type' => $request['type'],
            'image' => $filename,
			'indoor_image' => $indoor_image,
			'outdoor_image' => $outdoor_image,
        ]);
        return redirect('admin/event_type');
    }
    public function editEventType(int $id){
        $data = $this->eventType->getEventTypeByID($id);
        return response()->json($data, 200);
    }
    public function updateEventType(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $eventType = EventType::find($id);

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
		
		
		
		
		if(!empty($request['indoor_image'])){
            $filename1 = "Indoor_".time().'.'.$request['indoor_image']->getClientOriginalExtension();
            $request['indoor_image']->move(storage_path('app/public/EventTypeImg/'),$filename1);
            if($eventType->indoor_image != NULL){
                @unlink(storage_path('app/public/EventTypeImg/'.$eventType->indoor_image));
            }
        }else{
            $filename1 = $eventType->indoor_image;
        }
		if(!empty($request['outdoor_image'])){
            $filename2 = time().'.'.$request['outdoor_image']->getClientOriginalExtension();
            $request['outdoor_image']->move(storage_path('app/public/EventTypeImg/'),$filename2);
            if($eventType->outdoor_image != NULL){
                @unlink(storage_path('app/public/EventTypeImg/'.$eventType->outdoor_image));
            }
        }else{
            $filename2 = $eventType->outdoor_image;
        }

        $eventType->title = $request['title'];
        $eventType->image =  $filename;
		
		$eventType->indoor_image =  $filename1;
		
		$eventType->outdoor_image =  $filename2;
		
		$eventType->type = $request['type'];
		
        $eventType->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $eventType->save();
        return redirect('admin/event_type');
    }
    public function deleteEventType(int $id){
        $eventType = EventType::find($id);
        if(isset($eventType->image)){
            @unlink(storage_path('app/public/EventTypeImg/'.$eventType->image));
        }
        $eventType->delete();
        return redirect('admin/event_type');
    }


}
