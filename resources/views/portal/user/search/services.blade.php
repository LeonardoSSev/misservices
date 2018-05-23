@extends('templates.temp')
@include('templates.sections.header')


<div class="container-fluid">
    <div class="services-research">
        <h2 class="text-center">Lista de Serviços</h2>
        <div class="col-md-5">
            <div class="filter">
                <form action="@route( search.service )" class="form-group">
                    <label>Encontre um serviço</label>
                    <input type="text" name="service" class="form-control">
                    <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-7 list-services">
            @if( $services->count() > 0 )
                @foreach ($services as $service)                
                        <div class="service-box">
                            <h4>{{$service->user_name}} - {{$service->name}}</h4>
                            <p>{{$service->description}}</p>
                            <a href="{{route('user.service.details', [$service->user_id, $service->id])}}">
                                Ver detalhes
                            </a>
                        </div>
                @endforeach
                {!! $services->links() !!}
            @else
                <p>Nenhum registro encontrado, por favor pesquise outro serviço semelhante</p>
            @endif
        </div>
    </div>
</div>

@include('templates.sections.footer')