@extends('front.layouts.app')
@section('title', 'Doctors')

@section('style')
@endsection

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('front.show.all') }}">Doctors</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $doctor->user->name }}</li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
            <img src="{{ $doctor->image }}" alt="doctor" class="img-fluid rounded-circle" height="150" width="150">
            <div class="details-info d-flex flex-column gap-3 ">
                <h4 class="card-title fw-bold">{{ $doctor->user->name }}</h4>
                <div class="d-flex gap-3 align-bottom">
                    <ul class="rating">
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                    </ul>
                    <a href="#" class="align-baseline">submit rating</a>
                </div>
                <h6 class="card-title fw-bold">{{ $doctor->bio }}</h6>
            </div>
        </div>
        <hr />
        <form class="form" action="{{ route('front.bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $doctor->id }}">
            <input type="date" name="book" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
    </div>
@endsection

@section('script')
@endsection
