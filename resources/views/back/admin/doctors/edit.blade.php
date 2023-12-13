@extends('back.admin.layouts.app')
@section('title', 'Edit Doctor')

@section('style')
@endsection

@section('headerContent', 'Doctors')

@section('headerContentLink')
    <a href="{{ route('back.admin.doctors.index') }}">All</a>
@endsection

@section('headerContentActive', 'doctors')

@section('content')
    <div class="card card-primary">
        <form action="{{ route('back.admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Enter doctor image</label>
                        </div>
                    </div>
                </div>
                @error('image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>User</label>
                    <select class="form-control" name="user_id">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option {{ old('user_id') == $user->id || $doctor->user_id == $user->id ? 'selected' : '' }}
                                value="{{ $user->id }}">
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>Major</label>
                    <select class="form-control" name="major_id">
                        <option value="">Select Major</option>
                        @foreach ($majors as $major)
                            <option {{ old('major_id') == $major->id || $doctor->major_id == $major->id ? 'selected' : '' }}
                                value="{{ $major->id }}">
                                {{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('major_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputStatus1">Status</label>
                    <select name="status" id="exampleInputStatus1" class="form-control">
                        <option disabled selected>Choose Status</option>
                        @foreach ($status as $stat)
                            <option {{ old('status') == $stat || $major->status == $stat ? 'selected' : '' }}
                                value="{{ $stat }}">
                                {{ $stat }}</option>
                        @endforeach
                    </select>
                </div>
                @error('status')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputBio1">Bio</label>
                    <input type="text" name="bio" value="{{ old('bio', $doctor->bio) }}" class="form-control"
                        id="exampleInputBio1" placeholder="Enter doctor bio">
                </div>
                @error('bio')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
