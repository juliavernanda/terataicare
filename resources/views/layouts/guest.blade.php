<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
  <body>
    <div class="container main">

        @auth
        <div class="logout"><a href=" {{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" > {{ __('Logout') }}</a></div>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
        <div class="box-menu d-flex justify-content-center mt-5">
            <ul class="d-flex menu">
                @guest
                <a class="" href="/doctors">DOCTORS</a>
                <a class="" href="{{ url('/register') }}">REGISTER</a>
                <a class="" href="/login">LOGIN</a>
                @else

                <a class="" href="{{ route('homeUser') }}">HOME</a>
                <a class="" href="/doctors">DOCTORS</a>
                <a href="{{ route('profile',auth()->user()->id_user )}}">PROFILE</a>
                @endguest



            </ul>
        </div>
       @yield('guestbar')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
