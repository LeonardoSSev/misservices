<body id="page-top" class="index">

<div class="preloader">
    <div class="loader"></div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top"> <img src=" {{ asset('images/logo-misservices.png') }}" alt="log"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a href="{{route('index') }}">Inicio</a>
                </li>
                @if (Auth::check())
                <li>
                    <a href="{{route('user.search.categories') }}">Serviços</a>
                </li>
                @endif
                <li>
                    <a href="{{route('how') }}">Como Funciona</a>
                </li>
                <li>
                    <a href="{{route('contact') }}">Contato</a>
                </li>
                @if (Auth::check())
                    <li>
                        <a href="{{route('user.profile', [Auth::user()->id]) }}">Perfil</a>
                    </li>
                @endif
                @can('Admin')
                    <li><a href="{{route('admin.index') }}">Painel</a></li>
                @endcan
                @guest
                    <li>
                        <a href="{{ route("register") }}">Cadastro</a>
                    </li>
                    <li><a href="{{ route("login") }}">Entrar</a></li>
                @else
                <li class="nav-item dropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>