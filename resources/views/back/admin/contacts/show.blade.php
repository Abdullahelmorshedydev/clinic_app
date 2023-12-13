@extends('back.admin.layouts.app')
@section('title', $contact->name)

@section('style')
@endsection

@section('headerContent', $contact->name)

@section('headerContentLink')
    <a href="{{ route('back.admin.contacts.index') }}">All</a>
@endsection

@section('headerContentActive', 'contacts')

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ $contact->name }}" disabled class="form-control" id="exampleInputName1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" value="{{ $contact->email }}" disabled class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone1">Phone</label>
                <input type="text" value="{{ $contact->phone }}" disabled class="form-control" id="exampleInputPhone1">
            </div>
            <div class="form-group">
                <label for="exampleInputSubject1">Subject</label>
                <input type="text" value="{{ $contact->subject }}" disabled class="form-control"
                    id="exampleInputSubject1">
            </div>
            <div class="form-group">
                <label for="exampleInputMessage1">Message</label>
                <textarea class="form-control" id="exampleInputMessage1" disabled>{{ $contact->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputStatus1">Status</label>
                <input type="text" value="{{ $contact->status }}" disabled class="form-control" id="exampleInputStatus1">
            </div>
        </div>

        <div class="card-footer">
            @if ($contact->status == 'unread')
                <form class="btn btn-info" action="{{ route('back.admin.contacts.update', $contact->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn-info">Mark As Read</button>
                </form>
            @elseif($contact->status == 'read')
                <form class="btn btn-danger" action="{{ route('back.admin.contacts.destroy', $contact->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Delete</button>
                </form>
            @endif
        </div>
    </div>
@endsection

@section('script')
@endsection
