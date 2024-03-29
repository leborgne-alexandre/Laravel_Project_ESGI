<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route("home")}}">
                    10GAG
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">ADD POST +</button>
                        <a style="color:red" href="{{route("trashed-posts")}}"><i
                                class="far fa-trash-alt fa-4x ml-4"></i></a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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


                <div class="container">
                        @if(session()->has('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div>
                        @endif
                        @if(session()->has('error'))
                          <div class="alert alert-danger">
                            {{ session()->get('error') }}
                          </div>
                        @endif


            </div>


            <div class="row">

            @auth

             @if(auth()->user()->isAdmin())

                <div class="col md-2">

                    <div class="container">


                        <ul class="list-group">

                            <li class="list-group-item"><a href="{{route("categories.index")}}">Categories</a></li>
                            <li class="list-group-item"><a href="{{route("posts.create")}}">Post Gag</a></a></li>
                            <li class="list-group-item"><a href="{{route("users.index")}}">Users</a></a></li>

                        </ul>

                    </div>

                </div>

                @else




                <div class="col md-2">

                        <div class="container">


                            <ul class="list-group">

                                @foreach ($categories as $categorie)

                                <li class="list-group-item"><img class="mr-3" src="storage/{{$post["id_image"]}}"alt="" style="width: 50px"><a href="#">{{$categorie->name}}</a></li>


                                @endforeach

                            </ul>

                        </div>

                    </div>





                @endif

                @endauth



                <div class="col-md-10">
                    @yield('content')
                </div>

            </div>

        </main>



    </div>
    <script src="https://kit.fontawesome.com/2308eb7c9f.js"></script>

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d1d28d52e8a5351"></script>

</body>

</html>
