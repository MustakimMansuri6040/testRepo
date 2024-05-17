<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withSuccess('Oppes! You have entered invalid credentials');
    }   

    public function dashboard()
    {
        return view('dashboard');
    }

    
    public function dashboard_submit(Request $request)
    {
        $data = $request->all();
        return view('dashboard', $data);
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
