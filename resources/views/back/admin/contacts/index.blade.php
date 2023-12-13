@extends('back.admin.layouts.app')
@section('title', 'Contacts')

@section('style')
@endsection

@section('headerContent', 'Contacts')

@section('headerContentLink')
    <a href="{{ route('back.admin.contacts.create') }}">create</a>
@endsection

@section('headerContentActive', 'contacts')

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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($contacts)
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ Str::limit($contact->message, 25, '...') }}</td>
                                <td>{{ $contact->status }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('back.admin.contacts.show', $contact->id) }}">Show</a>
                                    <form class="btn btn-info"
                                        action="{{ route('back.admin.contacts.update', $contact->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-info">Mark As Read</button>
                                    </form>
                                    <form class="btn btn-danger"
                                        action="{{ route('back.admin.contacts.destroy', $contact->id) }}" method="post">
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
            {{ $contacts->links() }}
        </div>
    </div>
@endsection

@section('script')
@endsection
