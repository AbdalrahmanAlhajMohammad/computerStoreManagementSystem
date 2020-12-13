<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
     public function login()
     {
         return view('admin.login');
     }

     public function authenticate(Request $request)
     {

         if (Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'active'=>1]))
         {
            \auth()->user()->last_login_date=date('Y-m-d');
            \auth()->user()->save();
            return redirect()->route('accounts.profile');
         }
         else
         {
             \Session::flash('msg','d:'.__('auth.failed'));
            return redirect()->route('admin.login');
         }
     }




}
