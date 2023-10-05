<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    //
    /*public function showRegister ()
    {
        return view ('register');
    }
    public function register(Request $request)
    {
        $user = User::query()->create([
            'name'=>$request['name'],
            'department_id' => $request['department_id'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password'])
        ]);

        Auth::login($user);

        return redirect()->route('profile');
    }

    public function profile()
    {
        return view('profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required | string',
            'department_id' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('profile');
        }

        return back();
    }
    public function bookRegister()
    {
        return view('bookRegister');
    }*/

    public function showRegister ()
    {
        return view ('register');
    }

    //新規登録メソッドの定義
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required | string',
            'department_id' => 'integer | between:0,1',
            'email' => 'required | email:filter',
            'password' => 'required',
        ]);

        if($request['department_id'] == 0)
        {
            $depatment_name = '一般社員';
        }else{
            $depatment_name = 'システム部社員';
        }
        $user = User::query()->create([
        'name'=>$request['name'],
        'department_id'=>$request['department_id'],
        'department_name' => $depatment_name,
        'email' => $request['email'],
        'password'=>Hash::make($request['password'])
    ]);

        Auth::login($user);
        
        return redirect()->route('profile');
    }

    public function profile()
    {
        return view('profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            
            'email' => 'required',
            'password' => 'required',
            
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('profile');
        }

        return back();
    }
    
}
