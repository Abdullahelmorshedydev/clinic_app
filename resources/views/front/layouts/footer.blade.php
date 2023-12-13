<footer class="container-fluid bg-blue text-white py-3">
    <div class="row gap-2">

        <div class="col-sm order-sm-1">
            <h1 class="h1">About Us</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                laborum
                saepe
                enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                cum
                iure
                quod facere.</p>
        </div>
        <div class="col-sm order-sm-2">
            <h1 class="h1">Links</h1>
            <div class="links d-flex gap-2 flex-wrap">
                <a href="{{ route('front.home') }}" class="link text-white">Home</a>
                <a href="{{ route('front.majors') }}" class="link text-white">Majors</a>
                <a href="{{ route('front.show.all') }}" class="link text-white">Doctors</a>
                <a href="{{ route('front.contact.create') }}" class="link text-white">Contact</a>
                @auth
                    @if (auth()->user()->role == 'patient')
                        <a href="{{ route('back.patient.home') }}" class="link text-white">Dashboard</a>
                    @elseif(auth()->user()->role == 'doctor')
                        <a href="{{ route('back.doctor.home') }}" class="link text-white">Dashboard</a>
                    @elseif(auth()->user()->role == 'admin')
                        <a href="{{ route('back.home') }}" class="link text-white">Dashboard</a>
                    @endif
                    <form class="link text-white" action="{{ route('back.logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('auth.login') }}" class="link text-white">Login</a>
                    <a href="{{ route('auth.register') }}" class="link text-white">Register</a>
                @endguest
            </div>
        </div>
    </div>
</footer>
