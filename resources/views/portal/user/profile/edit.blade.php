@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('user.update.profile')}}" class="form" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="name">Nome:</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="email">E-mail:</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="cpf">CPF:</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" value="{{$user->cpf}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="telephone">Telefone:</label>
                        <input class="form-control" type="text" id="telephone" name="telephone" value="{{$telephone->ddd.$telephone->number}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="cellphone">Celular:</label>
                        <input class="form-control" type="text" id="cellphone" name="cellphone" value="{{$cellphone->ddd.$cellphone->number}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="state">UF:</label>
                        <input class="form-control" type="text" id="state" name="state" value="{{$user->state}}" required maxlength="2">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="city">Cidade:</label>
                        <input class="form-control" type="text" id="city" name="city" value="{{$user->city}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="zipcode">CEP:</label>
                        <input class="form-control" type="text" id="zipcode" name="zipcode" value="{{$user->zipcode}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="neighbourhood">Bairro:</label>
                        <input class="form-control" type="text" id="neighbourhood" name="neighbourhood" value="{{$user->neighbourhood}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="address">Endereço:</label>
                        <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="about">Sobre mim:</label>
                        <textarea class="form-control" name="about" id="about" cols="30" rows="10">{{$user->about}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button class="btn btn-form" type="submit">Editar informações</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('user.update.password')}}" class="form" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="password">Nova senha:</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="password">Digite novamente a nova senha:</label>
                        <input type="password" name="password2" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button class="btn btn-form" type="submit">Editar senha</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="{{route('user.profile.delete')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Excluir Conta</button>
    </form>
@stop