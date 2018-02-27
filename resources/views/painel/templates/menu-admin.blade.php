<header class="cabecalho-admin">
    <a href="/"><h1 class="logo"> MisServices </h1></a>
    <button class="btn-menu bg-gradient"><i class="fa fa-bars fa-lg"></i></button>
    <nav class="menu-admin">
        <a class="btn-close"><i class="fa fa-times"></i></a>
        <ul>
            <li><a href="/admin/">Home</a></li>
            <li><a href="/admin/users">Usuários</a></li>
            <li><a href="/admin/categories">Categorias</a></li>
            <li><a href="/admin/services">Serviços</a></li>
            <li><a href="/admin/roles">Papéis</a></li>
            <li><a href="/admin/permissions">Permissões</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>
        </ul>
    </nav>
</header>