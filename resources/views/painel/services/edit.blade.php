@extends('templates.temp')
@include('painel.templates.menu-admin')
<div class="container" id="cadastro">
    <h1>Categoria: {{$service->name}}</h1>
    <form method="GET" action="/admin/service/update/{{$service->id}}" name="cadastroForm">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="box box-desk radius{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$service->name}}" name="name" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="description" type="text" class="box box-desk radius{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $service->description }}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="category" class="box box-desk radius" name="category" value="{{ $service->category_id }}"required>
                    @foreach( $categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="user" class="box box-desk radius" name="user" value="{{ $service->user_id }}" required>
                    @foreach( $users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-desk radius bg-white">
                    Editar
                </button>
            </div>
        </div>
    </form>

</div>

@include('templates.sections.footer')