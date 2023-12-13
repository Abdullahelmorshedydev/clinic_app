<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
