<?php

namespace App\Http\Controllers\AdministratorAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Helper\ErrorCode;
use App\Administrator;

use App\Http\Requests\AdminSite\LoginRequest\Login;

class LoginController extends Controller
{

    public function showLogin()
    {
      return view('administratoronly/login');
    }

    public function login(Login $request)
    {
      if(Auth::guard('administrator')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')], $request->input('remember'))){
        return redirect('administratoronly/dashboard');
      }else{
        Parent::h_flash(ErrorCode::$Message402,"danger");
        return redirect('administratoronly/login');
      }
    }
}
