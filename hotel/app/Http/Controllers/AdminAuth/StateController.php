<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\State;
use App\Model\Country;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->state =  new State();
        $this->country =  new Country();
    }

    public function viewAllState(){
        
        $data['state'] = $this->state->getAllState();
        $data['country'] = $this->country->getAllApprovedCountry();

        foreach($data['state'] as $key=>$st) {
	        $data['state'][$key]->country = $this->country->getCountryTitle($data['state'][$key]->country_id);
	    }

        return view('admin.Hotels.states',$data);
    }

    public function addState(Request $request){
        $this->validate(request(), [
            'name' => 'required|max:255',
            'country_id'=>'required',
            'status'=>'required',
        ]);
        $state = State::create([
            'name' => $request['name'],
            'country_id' => $request['country_id'],
            'status' => $request['status']
        ]);
        return redirect('admin/states');
    }

    public function editState(int $id){
        $data = $this->state->getStateByID($id);
        $data['country'] = $this->country->getAllApprovedCountry();
        return response()->json($data, 200);
    }

    public function updateState(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'name' => 'required|max:255',
            'country_id'=>'required',
            'status' => 'required',
        ]);

        $state = State::find($id);
        $state->name = $request['name'];
        $state->country_id = $request['country_id'];
        $state->status = $request['status'];
        $state->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $state->save();
        return redirect('admin/states');
    }

    public function deleteState(int $id){
        $state = State::find($id);
        $state->delete();
        return redirect('admin/states');
    }
}
