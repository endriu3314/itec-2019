<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/b26abc9a12.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Homepage
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="dropdown">
                            <button type="button" class="btn btn-info text-white" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <div class="col">
                                        <i class="fa fa-shopping-cart ml-2" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </div>

                                    <?php $total = 0 ?>
                                    @foreach((array) session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                    @endforeach

                                    <div class="col">
                                        <p>Total: <span class="text-info">{{ $total }}</span></p>
                                    </div>
                                </div>
                                <hr/>

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="row px-2">
                                            <div class="col-4">
                                                <img src="{{ $details['img_url'] }}" class="img-fluid" />
                                            </div>
                                            <div class="col-8">
                                                <p>{{ $details['name'] }}</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                 <span class="ml-4 price text-info"> ${{ $details['price'] }}</span>
                                                </div>
                                                <div class="col-6">
                                                    <span class=""> Quantity:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <a href="{{ url('cart') }}" class="ml-4 btn btn-primary">View all</a>
                                </div>
                            </div>
                        </div>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Admin Links -->
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.home') }}">Admin</a>
                                </li>
                            @endif
                            <!-- Vanzator Links -->
                            @if (Auth::user()->isVanzator())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('vanzator.home') }}">Vanzator</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', ['id' => Auth::user()->id]) }}"> View my profile </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="m-4">
            @yield('content')
        </main>
    </div>
    <div class="m-4">
        @yield('content2')
    </div>
    @stack('scripts')
</body>

<script src="{{asset('js/app.js')}}"></script>

</html>
