<nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
    <div class="container">
        <div class="navbar-brand">
            <a class="fw-bold text-white m-0 text-decoration-none h3" href="{{ route('front.home') }}">VCare</a>
        </div>
        <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                <a type="button" class="btn btn-outline-light navigation--button"
                    href="{{ route('front.home') }}">Home</a>
                <a type="button" class="btn btn-outline-light navigation--button"
                    href="{{ route('front.majors') }}">majors</a>
                <a type="button" class="btn btn-outline-light navigation--button"
                    href="{{ route('front.show.all') }}">Doctors</a>
                <a type="button" class="btn btn-outline-light navigation--button"
                    href="{{ route('front.contact.create') }}">Contact</a>
                @auth
                    @if (auth()->user()->role == 'patient')
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="{{ route('back.patient.home') }}">Dashboard</a>
                    @elseif(auth()->user()->role == 'doctor')
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="{{ route('back.doctor.home') }}">Dashboard</a>
                    @elseif(auth()->user()->role == 'admin')
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="{{ route('back.home') }}">Dashboard</a>
                    @endif
                    <form action="{{ route('back.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light navigation--button">Logout</button>
                    </form>
                @endauth
                @guest
                    <a type="button" class="btn btn-outline-light navigation--button"
                        href="{{ route('auth.login') }}">login</a>
                    <a type="button" class="btn btn-outline-light navigation--button"
                        href="{{ route('auth.register') }}">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
