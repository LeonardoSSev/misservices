<body id="page-top">
    <header class="header-admin">
        <nav class="navbar navbar-default navbar-fixed">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('admin.index')}}"><img src="{{asset('images/logo-misservices.png')}}" alt="log"> </a>
                </div>

                <div id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li><a href="{{route('admin.index')}}">Home</a></li>
                        <li><a href="{{route('admin.users')}}">Usuários</a></li>
                        <li><a href="{{route('admin.categories')}}">Categorias</a></li>
                        <li><a href="{{route('admin.services')}}">Serviços</a></li>
                        <li><a href="{{route('admin.roles')}}">Papéis</a></li>
                        <li><a href="{{route('admin.permissions')}}">Permissões</a></li>
                        <li><a href="{{route('admin.phone_types')}}">Tipos de telefone</a></li>
                        <li><a href="{{route('admin.phones')}}">Telefones</a></li>
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
            
            <!-- /.container-fluid -->
        </nav>
    </header>