<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Country;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->country =  new Country();
    }

    public function viewAllCountry(){
        
        $data['country'] = $this->country->getAllCountry();
        return view('admin.Hotels.countries',$data);
    }

    public function addCountry(Request $request){
        $this->validate(request(), [
            'name' => 'required|max:255',
            'status'=>'required|max:255',
        ]);
        $country = Country::create([
            'name' => $request['name'],
            'status' => $request['status']
        ]);
        return redirect('admin/countries');
    }

    public function editCountry(int $id){
        $data = $this->country->getCountryByID($id);
        return response()->json($data, 200);
    }

    public function updateCountry(Request $request){
        $id = $request['id'];
        $this->validate(request(), [
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $country = Country::find($id);
        $country->name = $request['name'];
        $country->status = $request['status'];
        $country->is_deleted = ($request['is_deleted'] == 1) ? 1 : 0;
        $country->save();
        return redirect('admin/countries');
    }

    public function deleteCountry(int $id){
        $country = Country::find($id);
        $country->delete();
        return redirect('admin/countries');
    }
}
