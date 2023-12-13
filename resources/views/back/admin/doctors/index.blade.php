@extends('back.admin.layouts.app')
@section('title', 'Doctors')

@section('style')
@endsection

@section('headerContent', 'Doctors')

@section('headerContentLink')
    <a href="{{ route('back.admin.doctors.create') }}">Create</a>
@endsection

@section('headerContentActive', 'doctors')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>Major</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($doctors)
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="width: 100px; border-radius: 50%;" src="{{ $doctor->image }}"
                                        alt="{{ $doctor->id }}_image">
                                </td>
                                <td>{{ $doctor->user->name }}</td>
                                <td>{{ Str::limit($doctor->bio, 25, '...') }}</td>
                                <td>{{ $doctor->major->name }}</td>
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
                    @endisset
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $doctors->links() }}
        </div>
    </div>
@endsection

@section('script')
@endsection
