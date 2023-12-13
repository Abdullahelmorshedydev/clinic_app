<?php

namespace App\Http\Controllers\Back;

use App\Models\Major;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Back\Major\StoreRequest;
use App\Http\Requests\Back\Major\UpdateRequest;
use App\Traits\UploadFile;

class MajorController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.admin.majors.index', ['majors' => Major::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.admin.majors.create', ['status' => Major::$status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['image'] = UploadFile::upload($request->file('image'), 'uploads/majors');
        Major::create($data);
        toastr()->closeButton(true)->addSuccess('Major Created Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return view('back.admin.majors.show', ['major' => $major, 'status' => Major::$status]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('back.admin.majors.edit', ['status'=> Major::$status, 'major' => $major]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Major $major)
    {
        $data = $request->validated();
        $data['image'] = UploadFile::update($request->file('image'), 'uploads/majors/', $major->image, $request->image);
        $major->update($data);
        return back()->with('success', 'major updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        UploadFile::delete('uploads/majors/', $major->image);
        $major->delete();
        return back()->with('success', 'major deleted successfully');
    }
}
