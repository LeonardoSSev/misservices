<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MisServices, Prestação de Serviços.">
    <meta name="keywords" content="serviços, prestação de serviços, profissional, contratar serviço">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Jonatas Lopes e Leonardo Santos">
    <title>MisServices</title>

    <base href="/">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="icon" href="{{ asset("images/icone-misservices.ico") }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset("images/icone-misservices.ico") }}" type="image/x-icon" />

</head>
<body>

@yield('content')


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/script.js") }}"></script>
</body>
</html>