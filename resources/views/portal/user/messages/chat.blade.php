@extends('portal.user.profile.profile')
@section('content-profile')
    <div class="messages">
        <div class="box box-messages">
            @foreach ($chat as $message)
                    @if($message->sender_id === Auth()->user()->id)
                        <div class="send">
                            <p class="name">{{$message->senderName}}</p>
                            <p class="text-message">{{$message->text}}</p>
                            <p class="right">{{$message->updated_at}}</p>
                        </div>
                    @else
                        <div class="received">
                            <p class="name">{{$message->senderName}}</p>
                            <p class="text-message">{{$message->text}}</p>
                            <p class="right">{{$message->updated_at}}</p>
                        </div>
                    @endif
            @endforeach
        </div>
        <div>
            <form action="{{route('user.service.chat.update', $providedService->id)}}" class="form" method="POST">
                @csrf
                <textarea name="message" class="form-control" placeholder="Digite sua mensagem"></textarea>
                <button type="submit" class="btn btn-form right">Enviar Mensagem</button>
            </form>
        </div>
    </div>
@stop