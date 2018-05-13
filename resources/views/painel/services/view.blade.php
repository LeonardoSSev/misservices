@extends('painel.templates.template-admin')
@section('content-admin')
<div class="container" id="cadastro">
    <h1>Serviço: {{$service->name}}</h1>
        <div class="form-group row">
            <div class="col-md-6">
                <input id="name" type="text" class="box box-desk radius" value="{{$service->name}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input id="description" type="text" class="box box-desk radius" name="description" value="{{ $service->description }}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="category" class="box box-desk radius" name="category" value="{{ $service->category_id }}" disabled>
                    <option value="{{ $service->category_id }}">{{ $service->category->name }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <select id="user" class="box box-desk radius" name="user" value="{{ $service->user_id }}" disabled>
                    <option value="{{ $service->user_id }}">{{ $service->user->name }} - {{ $service->user->email }}</option>
                </select>
            </div>
        </div>
</div>

@endsection