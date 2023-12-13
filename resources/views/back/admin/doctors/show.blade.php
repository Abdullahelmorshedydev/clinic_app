@extends('back.admin.layouts.app')
@section('title', $doctor->user->name)

@section('style')
@endsection

@section('headerContent', $doctor->user->name)

@section('headerContentLink')
    <a href="{{ route('back.admin.doctors.index') }}">All</a>
@endsection

@section('headerContentActive', 'doctors')

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <img style="width: 100px; border-radius: 50%;" src="{{ $doctor->image }}" alt="{{ $doctor->id }}_image">
            </div>
            <div class="form-group">
                <label>User</label>
                <input type="text" value="{{ $doctor->user->name }}" disabled class="form-control"
                    id="exampleInputMajor1">
            </div>
            <div class="form-group">
                <label for="exampleInputMajor1">Major</label>
                <input type="text" value="{{ $doctor->major->name }}" disabled class="form-control"
                    id="exampleInputMajor1">
            </div>
            <div class="form-group">
                <label for="exampleInputStatus1">Status</label>
                <input type="text" value="{{ $doctor->status }}" disabled class="form-control" id="exampleInputStatus1">
            </div>
            <div class="form-group">
                <label for="exampleInputBio1">Bio</label>
                <textarea class="form-control" id="exampleInputBio1" disabled>{{ $doctor->bio }}</textarea>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('back.admin.doctors.edit', $doctor->id) }}" class="btn btn-info">Edit</a>
        </div>
    </div>
@endsection

@section('script')
@endsection
