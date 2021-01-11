<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function authenticate(AdminLoginRequest $request)
    {
        $login = $request->only('login');
        $password = $request->only('password');
        $password=md5($password['password']);
        if($login['login']===env('ADMIN_LOGIN') && $password===env('ADMIN_PASSWORD'))
        {
            $request->session()->regenerate();
            $request->session()->put('authenticated', time());
            return redirect()->route('admin.settings');
        }
        else
        {
            return back()->withErrors(['msg'=>'Неверный логин/пароль']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
