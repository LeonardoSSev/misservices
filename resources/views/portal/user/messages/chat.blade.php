@extends('portal.user.profile.profile')
@section('content-profile')
    <div style="border: 2px solid black; width: 1000px; height: 500px;">
        @foreach ($chat as $message)
                @if($message->sender_id === Auth()->user()->id)
                    <div style="background-color: lightgray;">
                        <p>{{$message->senderName}}</p>
                        <p style="float: right;">{{$message->text}}</p>
                        <p>{{$message->updated_at}}</p>
                    </div>
                @else
                    <div style="background-color: lightskyblue;">
                        <p>{{$message->senderName}}</p>
                        <p style="float: left;">{{$message->text}}</p>
                        <p>{{$message->updated_at}}</p>
                    </div>
                @endif
        @endforeach
    </div>
    <div>
        <form action="{{route('user.service.chat.update', $providedService->id)}}" method="POST">
            @csrf
            <textarea name="message" id="" cols="140" rows="5"></textarea>
            <button type="submit">Enviar Mensagem</button>
        </form>
    </div>
@stop