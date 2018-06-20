<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contate-nos</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form role="form" method="POST" action="{{route('send-email')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group">
                            <label for="name">Nome</label>
                            @guest
                                <input class="form-control" type="text" name="name" placeholder="Nome" required>
                            @else
                                <input class="form-control" type="text" name="name" placeholder="Nome" value="{{Auth()->user()->name}}" required>
                            @endguest
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group">
                            <label for="email">E-mail</label>
                            @guest
                                <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                            @else
                                <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{Auth()->user()->email}}" required>
                            @endguest
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group">
                            <label for="message">Mensagem</label>
                            @guest
                                <textarea placeholder="Mensagem" class="form-control" rows="5" name="message" required></textarea>
                            @else
                                @if(isset($emailContent['message']) && (!is_null($emailContent)))
                                    <textarea placeholder="Message" class="form-control" rows="5" name="message" required>{{$emailContent['message']}}</textarea>
                                @else
                                    <textarea placeholder="Message" class="form-control" rows="5" name="message" required></textarea>
                                @endif
                            @endguest

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-lg btn-form">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>