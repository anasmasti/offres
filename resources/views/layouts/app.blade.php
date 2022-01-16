<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FindJob - Recherche d'emploi</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="w-100 d-flex justify-content-around">
                <div class="ms-4">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>FindJob</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav w-100 d-flex justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">
                            @if (Auth::user() == null)
                                Accueil
                            @endif
                            @if (Auth::user())
                                @if ( Auth::user()->type == 'user')
                                    Accueil
                                @endif
                                @if ( Auth::user()->type == 'admin')
                                    Tableau de bord
                                @endif
                            @endif    
                            </a>
                          </li>
                          
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn btn-white dropdown-toggle text-capitalize" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Offres
                                    </a>

                                    <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                                        <li><a class="btn btn-sm btn-white" href="/offres">Liste</a></li>
                                        @if ( Auth::user())
                                            @if ( Auth::user()->type == 'admin')
                                                <li><a class="btn btn-sm btn-white my-2" href="/offre/add">Ajouter</a></li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @if ( Auth::user())
                                @if ( Auth::user()->type == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/employees">Employé(e)s</a>
                                    </li>  
                                
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/postules">Postulations</a>
                                    </li>
                                @endif
                            @endif
                    </ul>
                </div>    
                <div class="me-4">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn btn-white dropdown-toggle text-capitalize" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (Auth::user())
                                            <strong> {{ Auth::user()->prenom }} {{ Auth::user()->name }}</strong>
                                            @if (Auth::user()->type == "admin")
                                              <span class="badge bg-danger ms-1">Admin</span>
                                            @endif
                                        @endif
                                    </a>

                                    <ul class="dropdown-menu border-0 p-2" aria-labelledby="dropdownMenuLink">
                                        <li><a class="btn btn-sm btn-white" href="#">Profile</a></li>
                                        <li><a class="btn btn-sm btn-white my-2" href="#">Postulations</a></li>
                                        <li>
                                            <a class="btn btn-sm btn-danger rounded-pill" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Déconnecter') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                        </li>
                                    </ul>
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
</html>
