<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    

    protected $redirectTo = '/';
     /* @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        return User::create([
            'name' => $request->txtName,
            'email' => $request->txtEmail,
            'password' => bcrypt($request->txtPassword),
            'api_token'=>str_random(80),
        ]);
    }
    public function showloginpage()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $email = $request->txtEmail;
        $password = $request->txtPassword;

        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            ;
            $token = str_random(80);

            $request->user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();

            return redirect('admin/index');
        }
        else
            return redirect()->back()->with('alert', 'login Fail');;
    }
    public function logout()
    {
        Auth('web')->logout();
        return redirect()->back();
    }
}
