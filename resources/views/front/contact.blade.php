@extends('front.layouts.app')
@section('title', 'Contact Us')

@section('style')
@endsection

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">contact</li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <form class="form" action="{{ route('front.contact.store') }}" method="POST">
            @csrf
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"
                        required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control" id="phone"
                        required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email"
                        required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="subject">subject</label>
                    <select class="form-control" name="subject" id="subject">
                        <option value="">Choose Subject</option>
                        @foreach ($subjects as $subject)
                            <option {{ old('subject') == $subject ? 'selected' : '' }} value="{{ $subject }}">
                                {{ $subject }}</option>
                        @endforeach
                    </select>
                    @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="message">message</label>
                    <textarea class="form-control" name="message" id="message" required></textarea>
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
@endsection

@section('script')
@endsection
