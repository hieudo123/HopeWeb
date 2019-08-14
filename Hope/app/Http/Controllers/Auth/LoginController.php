<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected function create(Request $request)
    {
        return User::create([
            'name' => $request->txtName,
            'email' => $request->txtEmail,
            'password' => bcrypt($request->txtPassword),
            'api_token'=>str_random(80),
        ]);
    }
    public function login()
    {
        if(Auth()->check())
            return redirect('admin/');
        else
            return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $email = $request->txtEmail;
        $password = $request->txtPassword;

        if(Auth()->attempt(['email' => $email, 'password' => $password]))
        {
            ;
            $token = str_random(80);

            $request->user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();

            return redirect('admin/');
        }
        else
            return redirect()->back()->with('alert', 'login Fail');
    }
    public function logout()
    {
        Auth()->logout();
        return redirect()->back();
    }
}
