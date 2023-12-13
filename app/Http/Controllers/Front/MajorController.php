<?php

namespace App\Http\Controllers\Front;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $majors = Major::where('status', 'active')->whereHas('doctors')->paginate();
        return view('front.allMajors', compact('majors'));
    }
}
