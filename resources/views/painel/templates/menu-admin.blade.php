<body id="page-top">
<header class="col-sm-3 col-md-3 col-lg-3 col-xxl-2 header-admin">
    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin"> <img src="images/logo-misservices.png" alt="log"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li><a href="/admin">Home</a></li>
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
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
    <nav class="menu-admin">
        <ul>
            
        </ul>
    </nav>
</header>