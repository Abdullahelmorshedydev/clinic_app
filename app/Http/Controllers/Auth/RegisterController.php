<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
