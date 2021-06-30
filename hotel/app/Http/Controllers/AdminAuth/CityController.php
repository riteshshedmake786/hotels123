<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\City;
use App\Model\Country;
use App\Model\State;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->city =  new City();
        $this->country =  new Country();
        $this->state =  new State();
    }

    public function viewAllCity(){
        
        $data['city'] = $this->city->getAllCity();
        $data['country'] = $this->country->getAllApprovedCountry();
        $data['state'] = $this->state->getAllApprovedState();

        foreach($data['city'] as $key=>$st) {
	        $data['city'][$key]->country = $this->country->getCountryTitle($data['city'][$key]->country_id);
        	$data['city'][$key]->state = $this->state->getStateTitle($data['city'][$key]->state_id);
	    }

        return view('admin.Hotels.cities',$data);
    }

    public function addCity(Request $request){
        $this->validate(request(), [
            'name' => 'required|max:255',
            'country_id'=>'required',
            'state_id'=>'required',
            'status'=>'required',
        ]);
        $city = City::create([
            'name' => $request['name'],
            'country_id' => $request['country_id'],
            'state_id' => $request['state_id'],
            'status' => $request['status']
        ]);
        return redirect('admin/cities');
    }

    public function editCity(int $id){
        $data = $this->city->getCityByID($id);
        $data['country'] = $this->country->getAllApprovedCountry();
        $data['state'] = $this->state->getAllApprovedState();
        return response()->json($data, 200);
    }

    public function updateCity(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'name' => 'required|max:255',
            'country_id'=>'required',
            'state_id'=>'required',
            'status' => 'required',
        ]);

        $city = City::find($id);
        $city->name = $request['name'];
        $city->country_id = $request['country_id'];
        $city->state_id = $request['state_id'];
        $city->status = $request['status'];
        $city->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $city->save();
        return redirect('admin/cities');
    }

    public function deleteCity(int $id){
        $city = City::find($id);
        $city->delete();
        return redirect('admin/cities');
    }
}
