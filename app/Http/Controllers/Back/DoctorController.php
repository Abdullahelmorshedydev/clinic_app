<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Doctor\StoreRequest;
use App\Http\Requests\Back\Doctor\UpdateRequest;
use App\Models\Doctor;
use App\Models\Major;
use App\Models\User;
use App\Traits\UploadFile;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.admin.doctors.index', ['doctors' => Doctor::with('user')->with('major')->paginate(), 'status' => Doctor::$status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', '!=', 'doctor')->get();
        $majors = Major::where('status', '!=', 'deactive')->get();
        $status = Doctor::$status;
        return view('back.admin.doctors.create', compact('users', 'majors', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['image'] = UploadFile::upload($request->file('image'), 'uploads/doctors');
        Doctor::create($data);
        toastr()->closeButton(true)->addSuccess('Doctor Created Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('back.admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $users = User::where('role', '!=', 'doctor')->get();
        $majors = Major::where('status', '!=', 'deactive')->get();
        $status = Doctor::$status;
        return view('back.admin.doctors.edit', compact('doctor', 'users', 'majors', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Doctor $doctor)
    {
        $data = $request->validated();
        $data['image'] = UploadFile::update($request->file('image'), 'uploads/doctors/', $doctor->image, $request->image);
        $doctor->update($data);
        toastr()->closeButton(true)->addSuccess('Doctor Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        UploadFile::delete('uploads/doctors/', $doctor->image);
        $doctor->user->delete();
        toastr()->closeButton(true)->addSuccess('Doctor Deleted Successfully');
        return back();
    }
}
