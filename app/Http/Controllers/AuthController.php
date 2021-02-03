<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function getFormLogin()
    {
    	return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
    	$username =  $request->input('username');
    	$password =  $request->input('password');

    	// if (Auth::attempt([
     //        'email' => $username,
     //        'password' => $password     
     //    ])) {
     //        // dd(Auth::id());
     //        Auth::loginUsingId(Auth::id());
     //    } else {
     //        dd('Login Fail');
     //    }

        $user = User::where('email', $username)->first();
        if (!$user) {
            return back()->withError('Đăng nhập thất bại')->withInput();
        }
        if (Hash::check($password, $user->password)) {
            // Auth::loginUsingId($user->id);
            Auth::login($user);
            return redirect()->route('posts.index');
        }
        return back()->withError('Đăng nhập thất bại')->withInput() ;

    }
    public function getFormRegister()
    {
        return view('auth.register');
    }
    public function submitRegister(UserRegisterRequest $request)
    {
       $user = new User;
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->password = bcrypt($request->input('password'));
       $user->gender = $request->input('gender');
       $user->address = $request->input('address');
       $user->bio = $request->input('bio');
       $user->save();
       return redirect()->route('auth.login')->withSuccess('Đăng ký thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
