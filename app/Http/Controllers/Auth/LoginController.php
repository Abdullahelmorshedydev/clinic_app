<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                return redirect(RouteServiceProvider::BACK_ADMIN_HOME);
            } elseif (auth()->user()->role == 'doctor') {
                return redirect(RouteServiceProvider::BACK_DOCTOR_HOME);
            } elseif (auth()->user()->role == 'patient') {
                return redirect(RouteServiceProvider::BACK_PATIENT_HOME);
            }
        } else {
            return redirect()->back()->withErrors('error', trans('auth/login.not_found'));
        }
    }
}
