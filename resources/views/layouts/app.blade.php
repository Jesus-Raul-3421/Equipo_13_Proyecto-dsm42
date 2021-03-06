<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token() }}">
    <title>Storeline</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
     <!-- ICONS FONT AWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <!-- Bostrap 4-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-primary">
        <nav class="navbar navbar-light" style="background-color: #8EFF33;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{url('imagenes/logo.jpg')}}" alt="" width="65" height="50">
                  </a>
                <a class="navbar-brand" href="/">Storeline</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                 </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                         <a class="nav-link" href="/categoria">categoria <span class="sr-only">(current)</span></a>
                     </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="/cliente">Cliente <span class="sr-only">(current)</span></a>
                     </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="/domicilio">Domicilio <span class="sr-only">(current)</span></a>
                     </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="/productos">Productos <span class="sr-only">(current)</span></a>
                     </li>
                    </ul>
                </nav>
                </nav>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li button class="btn btn-outline-success me-2 btn-sm" >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li button >
                            @if (Route::has('register'))
                            <p> 
                                <li button type="button" class="btn btn-outline-danger btn-sm">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li button >
                            </p>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>