<?php

namespace App\Http\Controllers\Front;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function showDoctors($id)
    {
        $doctors = Doctor::where('major_id', $id)->with('user', 'major')->where('status', 'active')->get();
        return view('front.doctors', compact('doctors'));
    }

    public function showDoctor($id)
    {
        $doctor = Doctor::findOrFail($id)->where('status', 'active')->first();
        return view('front.showDoctor', compact('doctor'));
    }

    public function showAll()
    {
        $doctors = Doctor::where('status', 'active')->with('user', 'major')->paginate();
        return view('front.allDoctors', compact('doctors'));
    }
}
