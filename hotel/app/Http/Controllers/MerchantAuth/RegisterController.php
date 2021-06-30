<?php

namespace App\Http\Controllers\MerchantAuth;

use App\Mail\VerifyEmail;
use App\Merchant;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/merchant/hotelMerchantList';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('merchant.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $validate = Validator::make($data, [
            //'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:merchants',
            'company_name' => 'required',
//            'country' => 'required',
            'city' => 'required',
            'area' => 'required',
            'landline_no' => 'required|max:6|min:6',
            'mobile_no' => 'required|max:8|min:8',
            'agree' => 'required',
            'city_code' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
//        dd($validate, $validate->fails());
        return $validate;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Merchant
     */
	 
	public function register(Request $request) 
	{
	
	      $allUser = Merchant::get();
        /*foreach($allUser as $key=>$value) {
            if($request->email == $value->email) {
                $error = "Email already exists";
               // return view('user.auth.register')->with('error',$error);
				
				return redirect('/')->with('error', ' Email already exists');	
            }
        }
		*/
		
	   
	$validatedData = $request->validate([
            'company_name'=> 'required|max:255',
            'email'=> 'required|email|max:255|unique:merchants',
           // 'mobileno'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
		   
		   'mobile_no'=> 'required',
		   'password' => 'required',
            //'password' => 'required|min:8|confirmed',
            // 'company_name'=> 'max:255',
            // 'company_email'=> 'email|max:255|unique:users',
            ]);
			
		
        $hoteluser = new Merchant();
		
		
		  $hoteluser->name  ='';
          $hoteluser->email =$request->email;
          $hoteluser->company_name=$request->company_name;
          $hoteluser->area=$request->area;
          $hoteluser->landline_no=$request->landline_no;
          $hoteluser->mobile_no=$request->mobile_no;
          $hoteluser->password=Hash::make($request->password);
          $hoteluser->merchant_password=$request->password;
          $hoteluser->city=$request->city;
          $hoteluser->city_code=$request->city_code;
          $hoteluser->agree =$request->company_name;
          $hoteluser->country= '1';
		  $hoteluser->is_active=1;
		  
		  $hoteluser->save();
            
			
		
		
		//return redirect('/')->with('success', ' Registered Successfully');	
		
		 Session::flash('message', 'Hotel Registered Successfully'); 

		
		return redirect('/hotel/register')->with('success', ' Registered Successfully');
		
		
	}
    protected function create(array $data)
    {
		
	
        if (isset($data['m_img'])) {
            $filename = time() . '.' . $data['m_img']->getClientOriginalExtension();
            $data['m_img']->move(storage_path('app/public/merchantUser/'), $filename);
        } else {
            $filename = NULL;
        }
        $data['mobile_no'] = '+9715' . $data['mobile_no'];
        $data['landline_no'] = '+971' . $data['city_code'] . $data['landline_no'];
        $data['email_token'] = str_random(30);

        Mail::to($data['email'])->send(new VerifyEmail($data));
        return Merchant::create([
            'name' => '',
            'email' => $data['email'],
            'company_name' => $data['company_name'],
            'area' => $data['area'],
            'landline_no' => $data['landline_no'],
            'mobile_no' => $data['mobile_no'],
            'password' => bcrypt($data['password']),
            'merchant_password' => $data['password'],
            'city' => $data['city'],
            'city_code' => $data['city_code'],
            'agree' => $data['agree'],
            'country' => '1',
            'email_token' => $data['email_token']
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('merchant.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('merchant');
    }
}
