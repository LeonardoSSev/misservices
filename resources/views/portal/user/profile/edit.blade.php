@extends('portal.user.profile.profile')
@section('content-profile')

<div class="overlay-modal">
    <div class="modal">
        <div class="this-modal-content">
            <span class="close"><i class="fa fa-times"></i></span>
            <div class="the-content">
                <p>Deseja realmente Excluir a sua conta?</p>
            </div>
            <div class="modal-decision">
                <a class="right btn btn-danger" href="{{route('user.profile.delete')}}">Excluir</a>
                <button class="left close">Cancelar</button>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{route('user.update.profile')}}" class="form" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="name">Nome:</label>
                        <input placeholder="Nome" class="form-control" type="text" id="name" name="name" value="{{$user->name}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="email">E-mail:</label>
                        <input placeholder="E-mail" class="form-control" type="email" id="email" name="email" value="{{$user->email}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="cpf">CPF:</label>
                        <input placeholder="CPF" class="form-control" type="text" id="cpf" name="cpf" value="{{$user->cpf}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="telephone">Telefone:</label>
                        <input placeholder="Telefone" class="form-control" type="text" id="telephone" name="telephone" value="{{$telephone->ddd.$telephone->number}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="cellphone">Celular:</label>
                        <input placeholder="Celular" class="form-control" type="text" id="cellphone" name="cellphone" value="{{$cellphone->ddd.$cellphone->number}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="state">UF:</label>
                        <input placeholder="UF" class="form-control" type="text" id="state" name="state" value="{{$user->state}}" required maxlength="2">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="city">Cidade:</label>
                        <input placeholder="Cidade" class="form-control" type="text" id="city" name="city" value="{{$user->city}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="zipcode">CEP:</label>
                        <input placeholder="CEP" class="form-control" type="text" id="zipcode" name="zipcode" value="{{$user->zipcode}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="neighbourhood">Bairro:</label>
                        <input placeholder="Bairro" class="form-control" type="text" id="neighbourhood" name="neighbourhood" value="{{$user->neighbourhood}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="address">Endereço:</label>
                        <input placeholder="Endereço" class="form-control" type="text" id="address" name="address" value="{{$user->address}}" required>
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
                        <button class="btn btn-form" style="width: 50%" type="submit">Editar informações</button>
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
                        <input placeholder="Nova senha" class="form-control" type="password" name="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 floating-label-form-group">
                        <label for="password">Digite novamente a nova senha:</label>
                        <input placeholder="Digite novamente a nova senha" type="password" name="password2" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button class="btn btn-form" style="width: 50%" type="submit">Editar senha</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-danger right" id="open-modal-2">Excluir Conta</button>
    </div>
@stop