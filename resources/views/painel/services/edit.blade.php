@extends('painel.templates.template-admin')
@section('content-admin')
<?php $selected = 'selected' ?>
<div id="cadastro">
    <div class="col-md-10">
        <div class="title-content">
            <h1 class="left">Serviço: {{$service->name}}</h1>
            <a href="{{ route( 'admin.services' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
    <form method="GET" action="/admin/service/update/{{$service->id}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-4">
                <span>Nome</span>
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$service->name}}" name="name" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <span>Descrição</span>
                <textarea id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ $service->description }}</textarea>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <span>Categoria do Serviço</span>
                <select id="category" class="form-control " name="category" value="{{ $service->category_id }}"required>
                    @foreach( $categories as $category)
                        @if ( $category->id == $service->category_id )
                            <option value="{{ $category->id }}" <?= $selected ?> >{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <span>Usuário</span>
                <select id="user" class="form-control " name="user" value="{{ $service->user_id }}" required>
                    @foreach( $users as $user)
                        @if ( $user->id == $service->user_id )
                            <option value="{{ $user->id }}" <?= $selected ?> >{{ $user->name }} - {{ $user->email }}</option>
                        @else
                            <option value="{{ $user->id }}" >{{ $user->name }} - {{ $user->email }}</option>
                        @endif                        
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Atualizar
                </button>
            </div>
        </div>
    </form>

</div>

@endsection