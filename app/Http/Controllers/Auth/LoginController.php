<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = '/home';

    public function show()
    {
        return view('auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password'])))
        {
            if(auth()->user()->role =='admin'){
                return redirect()->route('admin.home');
            }
            else if(auth()->user()->role =='ketua'){
                return redirect()->route('ketua.home');         
            }
            else if(auth()->user()->role == 'masyarakat'){
                return redirect()->route('guest.home');
            }       
        }else{
            return redirect()->route('loginPage')->with('error','Tidak Valid');
        }
    } 

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('loginPage');
      }
      
}
