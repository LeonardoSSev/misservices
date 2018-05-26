@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="">Habilidades</a></li>
        </ul>
    </div>
    <div class="form-abilities">
        <form action="{{route('user.add.abilities')}}" method="POST" class="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-xs-8 floating-label-form-group">
                    <label for="ability">Habilidade</label>
                    <input class="form-control" type="text" name="ability" placeholder="Habilidade" required>
                </div>
                <div class="form-group col-xs-4">
                    <button type="submit" class="btn btn-form">Incluir</button>
                </div>
            </div>
        </form>
    </div>
    <div class="list-abilities">
        @if(!count($abilities) > 0)
            <div class="box">
                <p>Você não possui nenhuma habilidade cadastrada ainda</p>
            </div>
        @else

            @foreach($abilities as $ability)
                <div class="box box-shadow">
                    <span>
                        <p>
                            {{$ability->name}}
                        </p>
                        <a href="{{route('user.remove.ability', $ability->id)}}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </span>
                </div>
            @endforeach
        @endif
    </div>
@stop