@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a href="">Histórico de Serviços</a></li>
        </ul>
    </div>
    <h4>Cadastrar serviço</h4>
    <div>
        <form action="{{route('user.store.service')}}" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="name">Nome do serviço:</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="description">Descrição do serviço:</label>
                <input type="text" name="description">
            </div>
            <div>
                <label for="category"></label>
                <select id="category" class="form-control" name="category" required>
                    @foreach( $categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <div>
                    <button type="submit">Adicionar serviço</button>
                </div>
                <div>
                    <a href="{{route('contact.message', ['Categoria inexistente'])}}" style="color: dodgerblue;">Não tem nenhuma categoria relacionada ao seu serviço? Contate-nos</a>
                </div>
            </div>
        </form>
    </div>
    <div>
        @if(!$numServices > 0)
                <div style="border: 2px black solid;">
                    <p>Você ainda não tem nenhum serviço cadastrado</p>
                </div>
        @else
            @foreach($services as $service)
                <div style="border: 2px black solid;">
                    <p>{{$service->name}}</p>
                    <p>{{$service->description}}</p>
                </div>
            @endforeach
        @endif
    </div>
@stop