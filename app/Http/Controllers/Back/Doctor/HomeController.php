<?php

namespace App\Http\Controllers\Back\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('back.doctor.index');
    }
}
