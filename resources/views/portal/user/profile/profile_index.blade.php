@extends('portal.user.profile.profile')
@section('content-profile')
<ul>
    <a href="#"><li class="box-list col-lg-3">
        <span>Mensagens</span>
        <i class="fa fa-comment-o"></i>
    </li></a>
    <a href="{{route('user.abilities')}}"><li class="box-list col-lg-3">
        <span>Habilidades</span>
        <i class="fa fa-address-card-o"></i>
    </li></a>
    <a href="{{route('user.requests')}}"><li class="box-list col-lg-3">
        <span>Propostas</span>
        <i class="fa fa-paper-plane-o"></i>
    </li></a>
    <a href="{{route('user.current.services')}}"><li class="box-list col-lg-3">
        <span>Serviços em Andamento</span>
        <i class="fa fa-cogs"></i>
    </li></a>
    <a href="{{route('user.requested')}}"><li class="box-list col-lg-3">
        <span>Histórico de Serviços</span>
        <i class="fa fa-cogs"></i>
    </li></a>
    <a href="{{route('user.services')}}"><li class="box-list col-lg-3">
        <span>Meus Serviços</span>
        <i class="fa fa-cogs"></i>
    </li></a>
</ul>
@stop