@extends('back.admin.layouts.app')
@section('title', $major->name)

@section('style')
@endsection

@section('headerContent', $major->name . ' Major')

@section('headerContentLink')
    <a href="{{ route('back.admin.majors.index') }}">all</a>
@endsection

@section('headerContentActive', 'majors')

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($major->doctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img style="width: 100px; border-radius: 50%;" src="{{ $doctor->image }}"
                                    alt="{{ $doctor->id }}_image">
                            </td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ Str::limit($doctor->bio, 20, '...') }}</td>
                            <td>{{ $doctor->status }}</td>
                            <td>
                                <a class="btn btn-secondary"
                                    href="{{ route('back.admin.doctors.show', $doctor->id) }}">Show</a>
                                <a class="btn btn-info" href="{{ route('back.admin.doctors.edit', $doctor->id) }}">Edit</a>
                                <form class="btn btn-danger d-inline"
                                    action="{{ route('back.admin.doctors.destroy', $doctor->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{-- {{ $doctors->links() }} --}}
        </div>
    </div>
@endsection

@section('script')
@endsection
