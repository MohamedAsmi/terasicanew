<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Employee;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = Employee::where('e_email', $request->email)->get();
        if (count($data) > 0) {
            Employee::where('e_email', $request->email)
                ->update(['e_status' => 1,'last_spot'=> date('Y-m-d H:i:s')]);
        }

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            if (auth()->user()->is_admin == 1) {
                return redirect()->route('superadmin');
            } elseif (auth()->user()->is_admin == 2) {
                return redirect()->route('adminHome');
            } elseif (auth()->user()->is_admin == 0) {
                return redirect()->route('userhome');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerUser($user);

        return redirect()->route('login');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerUser($user);

        return redirect()->route('login');
    }


    public function _registerUser($data)
    {
        if ($data->email != '') {
            return;
        }
        $user = User::where('email', '=', $data->email)->first();

        if (!$user) {
            $user = new user();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        $data = Employee::where('e_email',  $data->email)->get();
        if (count($data) > 0) {
            Employee::where('e_email',  $data->email)
                ->update(['e_status' => 1,'last_spot'=> date('Y-m-d H:i:s')]);
        }
        Auth::login($user);
    }
}
