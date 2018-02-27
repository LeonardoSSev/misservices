<header class="cabecalho container">
    <a href="/"><h1 class="logo">MisServices </h1></a>
    <button class="btn-menu bg-gradient"><i class="fa fa-bars fa-lg"></i></button>
    <nav class="menu">
        <a class="btn-close"><i class="fa fa-times"></i></a>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/how">Como Funciona</a></li>
            <li><a href="/contact">Contato</a></li>
            @can('Admin')
                <li><a href="/admin">Painel</a></li>
            @endcan
            @guest
                <li><a href="{{ route("register") }}">Cadastro</a></li>
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
    </nav>
</header>