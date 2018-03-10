<body id="page-top" class="index">

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
            <a class="navbar-brand" href="#page-top"> <img src="images/logo-misservices.png" alt="log"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <!-- <li class="page-scroll">
                    <a href="#portfolio">Home</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">Como Funciona</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li> -->
                <li>
                    <a href="/">Inicio</a>
                </li>
                <li>
                    <a href="/how">Como Funciona</a>
                </li>
                <li>
                    <a href="/contact">Contato</a>
                </li>
                @can('Admin')
                    <li><a href="/admin">Painel</a></li>
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

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="images/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">MisServices</span>
                    <hr class="star-light">
                    <span class="skills">Encontre aqui o serviço que você precisa</span>
                    <div class="buscar">
                        <input type="text" class="txt_buscar" name="servico" id="servico">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>