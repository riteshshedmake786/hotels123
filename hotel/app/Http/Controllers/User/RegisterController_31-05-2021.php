<?php
namespace App\Http\Controllers\User;
use App\Otp;
use App\User;
use Carbon\Carbon;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function register()
    {
        return view('user.auth.register')->with('error','');
    }
    public function insertUser(Request $request)
    {

        $allUser = User::get();
        foreach($allUser as $key=>$value) {
            if($request->email == $value->email) {
                $error = "Email already exists";
                return view('user.auth.register')->with('error',$error);
            }
        }
	$validatedData = $request->validate([
            'fullname'=> 'required|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'mobileno'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:8|confirmed',
            // 'company_name'=> 'max:255',
            // 'company_email'=> 'email|max:255|unique:users',
            ]);
        $user = new User();

        if($request->user_type == "Company"){
            $user->user_type = 'C';
            $user->company_name = $request->company_name;
            $user->company_email = $request->company_email;
        }
        if($request->user_type == "Indiviual"){
            $user->user_type = 'I';
        }
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->mobile = $request->mobileno;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/');
    }

    public function addVerificationOtp(Request $request) {
        $url = 'http://customers.smartvision.ae/sms/smsapi?api_key=C20032916088730a26b613.98770523&type=text&contacts='.$request->mobile.'&senderid=7891&msg=Greetings%20from%20HotelsVenues,%20Your%20OTP%20for%20mobile%20verification%20is%20'.$request->otp.'%20!';
        $ch = curl_init($url);
        $result = curl_exec ($ch);
        $otp = new otp();
        $otp->mobile = $request->mobile;
        $otp->otp = $request->otp;
        $otp->return_id = $result;
        $otp->created_at = Carbon::now()->toDateTimeString();
        $otp->save();
        return 1;
    }

    public function verifyOtp(Request $request) {
        $verify = Otp::where('mobile', $request->mobile)->orderBy('created_at', 'desc')->first();
//        dd($request, $verify);
        if($verify->otp == $request->otp)
            return true;
        else
            return false;
    }

    public function resetPassword(Request $request) {
        return redirect('/');
    }
}
