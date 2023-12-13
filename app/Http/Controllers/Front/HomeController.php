<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $majors = Major::where('status', 'active')->whereHas('doctors')->orderBy('id', 'ASC')->get();
        $doctors = Doctor::where('status', 'active')->with('user','major')->orderBy('id', 'ASC')->get();
        return view('front.index', compact('majors', 'doctors'));
    }
}
