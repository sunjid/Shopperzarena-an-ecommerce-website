<?php

namespace App\Http\Controllers\Auth\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VerifyRegistration;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Auth;
use Session;


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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }


    public function login(Request $request)
    {

      $this->validate($request,[
          'email' => 'required|email',
          'password' =>'required',
      ]);

      
      
            //Login This admin
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
             {
              //Log him Now
              return redirect()->intended(route('admin.index'));
            }
            else{
                //If there is no account of admin
                Session()->flash('sticky_error','Invalid Login');
                return back();
            }
                     
    }

      public function logout(Request $request)
      {
          $this->guard()->logout();

          $request->session()->invalidate();

          return  redirect()->route('admin.login');
      }
        

    }

