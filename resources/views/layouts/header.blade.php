<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Consumo de API de Endereços - {{ $title }}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ route('index') }}">Revenda Mais</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">Início <span class="sr-only">(atual)</span></a>
            </li>
        </ul>
        <form method="POST" action="{{ route('store') }}" class="form-inline my-2 my-lg-0">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="cep" placeholder="CEP" aria-label="CEP" value="{{ old('cep') }}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Cadastrar</button>
        </form>
    </div>
</nav>