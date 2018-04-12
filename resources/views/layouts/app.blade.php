<html>
    <head>
        <title>@yield('title')</title>
        <meta name="desc" value="@yield('title')">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>
        <div class="row">
            <div class="col-md-12 text-center">
                @guest
                    <a href="{{ route('register') }}/" title="register" class="btn btn-secondary float-right mr-1">register</a>
                    <a href="{{ route('login') }}" title="log in" class="btn btn-secondary float-right mr-1">log in</a>
                @else
                    <a class="btn btn-secondary float-right mr-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">log out</a>
                    <div class="float-right mr-1">{{ Auth::user()->name }}</div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                <b>Welcome to the hencam forum!</b>
            </div>
        </div>
        <div class="row ml-2">
            <div class="col-md-3 col-lg-2 col-sm-12 border rounded p-1">
                @section('sidebar')
                    <b>Dashboard</b>
                @show
            </div>
            <div class="col-md-8 col-lg-9 col-sm-12 border rounded p-1 m-1">
                @guest
                    <p>Welcome to the <a href="http://www.hencam.co.uk" target="_blank" title="visit hencam">hencam</a> forum!  Feel free to browse, but it's more fun to take part!  You can <a href="/sign-up/" title="sign up">sign up</a> or <a href="/log-in/" title="log in">log in</a> if you're already a member.</p>
                @endguest
                @yield('content')
            </div>
        </div>
    </body>
</html>
