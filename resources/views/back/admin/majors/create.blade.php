@extends('back.admin.layouts.app')
@section('title', 'Create new major')

@section('style')
@endsection

@section('headerContent', 'Majors')

@section('headerContentLink')
    <a href="{{ route('back.admin.majors.index') }}">All</a>
@endsection

@section('headerContentActive', 'majors')

@section('content')
    <div class="card card-primary">
        <form action="{{ route('back.admin.majors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Enter major image</label>
                        </div>
                    </div>
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                        id="exampleInputName1" placeholder="Enter major name">
                </div>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputStatus1">Status</label>
                    <select name="status" id="exampleInputStatus1" class="form-control">
                        <option disabled selected>Choose Status</option>
                        @foreach ($status as $stat)
                            <option {{ old('status') == $stat ? 'selected' : '' }} value="{{ $stat }}">
                                {{ $stat }}</option>
                        @endforeach
                    </select>
                </div>
                @error('status')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
