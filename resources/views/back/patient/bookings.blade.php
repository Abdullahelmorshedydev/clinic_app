@extends('back.patient.layouts.app')
@section('title', 'Bookings')

@section('style')
@endsection

@section('headerContent', 'Bookings')

@section('headerContentLink')
    <a href="{{ route('back.patient.home') }}">all</a>
@endsection

@section('headerContentActive', 'bookings')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Doctor Name</th>
                        <th>Major Name</th>
                        <th>Book</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($bookings)
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->doctor->user->name }}</td>
                                <td>{{ $booking->doctor->major->name }}</td>
                                <td>{{ $booking->book }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    @if ($booking->status == 'pending' || $booking->status == 'accepted')
                                        <a class="btn btn-secondary"
                                            href="{{ route('back.doctor.bookings.cancelBooking', $booking->id) }}">Cancel</a>
                                    @endif
                                    <form class="btn btn-danger d-inline"
                                        action="{{ route('back.doctor.bookings.destroy', $booking->id) }}" method="post">
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
            {{ $bookings->links() }}
        </div>
    </div>
@endsection

@section('script')
@endsection
