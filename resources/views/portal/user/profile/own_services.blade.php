@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="{{ route('user.services') }}">Meus Serviços</a></li>
        </ul>
    </div>
    <h4>Cadastrar serviço</h4>
    <div>
        <form action="{{route('user.store.service')}}" class="form" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-xs-12 floating-label-form-group">
                    <label for="name">Nome do serviço:</label>
                    <input class="form-control" type="text" placeholder="Nome do serviço" name="name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12 floating-label-form-group">
                    <label for="description">Descrição do serviço:</label>
                    <input type="text" class="form-control" placeholder="Descrição do serviço" name="description">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12 floating-label-form-group">
                    <label for="category">Categoria</label>
                    <select id="category" class="form-control" name="category" required>
                        @foreach( $categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12 floating-label-form-group">
                    <button class="btn btn-form" type="submit">Adicionar serviço</button>
                </div>
                <div class="col-xs-12 floating-label-form-group">
                    <a href="{{route('contact.message', ['Categoria inexistente'])}}" style="color: dodgerblue;">Não tem nenhuma categoria relacionada ao seu serviço? Contate-nos</a>
                </div>
            </div>
        </form>
    </div>
    <div>
        @if(!$numServices > 0)
                <div class="box">
                    <p>Você ainda não tem nenhum serviço cadastrado</p>
                </div>
        @else
            @foreach($services as $service)
                <div class="box box-shadow">
                    <p>{{$service->name}}</p>
                    <p>{{$service->description}}</p>
                    <span>
                        <a href="" class="right">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </span>
                </div>
            @endforeach
        @endif
    </div>
@stop