@extends('back.admin.layouts.app')
@section('title', 'Majors')

@section('style')
@endsection

@section('headerContent', 'Majors')

@section('headerContentLink')
    <a href="{{ route('back.admin.majors.create') }}">create</a>
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
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($majors)
                        @foreach ($majors as $major)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="width: 100px; border-radius: 50%;" src="{{ $major->image }}"
                                        alt="{{ $major->name }}_image">
                                </td>
                                <td>{{ $major->name }}</td>
                                <td>{{ $major->status }}</td>
                                <td>
                                    <a class="btn btn-secondary"
                                        href="{{ route('back.admin.majors.show', $major->id) }}">Show</a>
                                    <a class="btn btn-info" href="{{ route('back.admin.majors.edit', $major->id) }}">Edit</a>
                                    <form class="btn btn-danger d-inline"
                                        action="{{ route('back.admin.majors.destroy', $major->id) }}" method="post">
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
            {{ $majors->links() }}
        </div>
    </div>
@endsection

@section('script')
@endsection
