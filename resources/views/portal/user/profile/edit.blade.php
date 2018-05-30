@extends('portal.user.profile.profile')
@section('content-profile')    
    <div class="row">
        <form action="{{route('user.update.profile')}}" class="form" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <label for="name">Nome:</label>
                <input class="form-control" type="text" name="name" value="{{$user->name}}" required>
            </div>
            <div class="row">
                <label for="email">E-mail:</label>
                <input class="form-control" type="email" name="email" value="{{$user->email}}" required>
            </div>
            <div class="row">
                <label for="cpf">CPF:</label>
                <input class="form-control" type="text" name="cpf" value="{{$user->cpf}}" required>
            </div>
            <div class="row">
                <label for="telephone">Telefone:</label>
                <input class="form-control" type="text" name="telephone" value="{{$telephone->ddd.$telephone->number}}" required>
            </div>
            <div class="row">
                <label for="cellphone">Celular:</label>
                <input class="form-control" type="text" name="cellphone" value="{{$cellphone->ddd.$cellphone->number}}" required>
            </div>
            <div class="row">
                <label for="state">UF:</label>
                <input class="form-control" type="text" name="state" value="{{$user->state}}" required>
            </div>
            <div class="row">
                <label for="city">Cidade:</label>
                <input class="form-control" type="text" name="city" value="{{$user->city}}" required>
            </div>
            <div class="row">
                <label for="zipcode">CEP:</label>
                <input class="form-control" type="text" name="zipcode" value="{{$user->zipcode}}" required>
            </div>
            <div class="row">
                <label for="neighbourhood">Bairro:</label>
                <input class="form-control" type="text" name="neighbourhood" value="{{$user->neighbourhood}}" required>
            </div>
            <div class="row">
                <label for="address">Endereço:</label>
                <input class="form-control" type="text" name="address" value="{{$user->address}}" required>
            </div>
            <div class="row">
                <label for="about">Sobre mim:</label>
                <textarea class="form-control" name="about" id="about" cols="30" rows="10">{{$user->about}}</textarea>
            </div>
            <div>
                <button class="btn btn-form" type="submit">Editar informações</button>
            </div>
        </form>
    </div>
    <div class="row">
        <form action="{{route('user.update.password')}}" class="form" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <label for="password">Nova senha:</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="row">
                <label for="password">Digite novamente a nova senha:</label>
                <input type="password" name="password2" required>
            </div>
            <div>
                <button class="btn btn-form" type="submit">Editar senha</button>
            </div>
        </form>
    </div>
@stop