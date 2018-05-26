@extends('painel.templates.template-admin')
@section('content-admin')
<div id="cadastro">
    <div class="col-md-10">
        <div class="title-content">
            <h1 class="left">Serviço: {{$service->name}}</h1>
            <a href="{{ route( 'admin.services' ) }}" class="btn btn-default right">
                Voltar
            </a>
        </div>
    </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" value="{{$service->name}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ $service->description }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="category" class="form-control" name="category" value="{{ $service->category_id }}" disabled>
                    <option value="{{ $service->category_id }}">{{ $service->category->name }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="user" class="form-control" name="user" value="{{ $service->user_id }}" disabled>
                    <option value="{{ $service->user_id }}">{{ $service->user->name }} - {{ $service->user->email }}</option>
                </select>
            </div>
        </div>
</div>

@endsection