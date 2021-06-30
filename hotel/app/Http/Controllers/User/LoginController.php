<?php
namespace App\Http\Controllers\User;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hesto\MultiAuth\Traits\LogsoutGuard;
class LoginController extends Controller
{
   
    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }
       /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    
    public $redirectTo = '/user/profile';
 
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function index()
    {
        //return view('user.auth.login');
		$data=array();
		
	    return view('front/login', $data);
    }
	
	 public function index_old()
    {
        return view('user.auth.login');
    }
	
	
	
      /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }
   
}
?>