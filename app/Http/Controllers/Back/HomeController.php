<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('back.admin.index');
    }
}
