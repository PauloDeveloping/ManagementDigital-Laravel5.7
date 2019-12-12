@extends('layout')

    <title>Cadastro de funcionários</title>

@section('content')

  <div class="d-flex" id="wrapper">

    <div class="bg-blue" id="sidebar-wrapper">
      <img class="logo mt-2" src="{{asset('img/logo.png')}}" width="150" height="150">
      <div class="sidebar-heading"></div>
      <div class="list-group list-group-flush">
        <ul class="list-unstyled components">
            <li class="bg-hover">
                <a href="{{route('funcionarios.index')}}" class="color-white"><i class="fas fa-list-alt color-white margin"></i>&nbsp;Listagem de funcionários</a>
            </li>

            <li class="bg-hover">
                <a href="{{route('funcionarios.create')}}" class="color-white"><i class="fas fa-edit color-white margin"></i>&nbsp;Cadastro de funcionários</a>
            </li>
        </ul>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-blue2">
        <button class="btn btn-outline-light fas fa-bars" id="menu-toggle"></button>

        &nbsp;<a class="navbar-brand" href="#">&nbsp;<label class="text-white"></label></a>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav mr-auto"></ul>
            
            <ul class="navbar-nav">
                <span class="navbar-text text-white">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white; font-size: 17px;">
                            Seja bem vindo: {{ Auth::user()->name }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </span>
            </ul>
        </div>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-light bg-white">

        &nbsp;<a class="navbar-brand" href="#">&nbsp;<label class="fas fa-suitcase">&nbsp;Cadastro de funcionários</label></a>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text text-white">
                <a href="{{route('funcionarios.index')}}"><button class="btn btn-outline-primary"><label class="fas fa-list"></label>&nbsp;Listagem</button></a>
            </span>
        </div>
      </nav>

      <div class="card mt-1">
        <form action="{{route('funcionarios.store')}}" method="post" id="formCadastro">
            {{csrf_field()}} <!-- Anti-BOT -->
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <legend>Dados Pessoais</legend>

                <div class="form-row">
                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-user"></label><label>&nbsp;Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-envelope"></label><label>&nbsp;Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>

                <div class="form-row mt-4">
                    <div class="col-md-4 col-xs-12">
                        <label class="fas fa-calendar"></label><label>&nbsp;Data de nascimento</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label class="fas fa-id-badge"></label><label>&nbsp;RG</label>
                        <input type="text" name="rg" id="rg" class="form-control" data-mask="00.000.000-0">
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label class="fas fa-id-card"></label><label>&nbsp;CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" data-mask="000.000.000-00">
                    </div>
                </div>

                <div class="form-row mt-4 align-items-center">
                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-mobile"></label><label>&nbsp;Celular</label>
                        <input type="text" name="celular" id="celular" class="form-control" data-mask="(00) 00000-0000">
                    </div>

                    <div class="col-md-6 col-xs-6">
                        <label class="fas fa-phone"></label><label>&nbsp;Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" data-mask="(00) 0000-0000">
                    </div>
                </div>

                <legend class="mt-4">Dados do Cargo</legend>

                <div class="form-row">
                    <div class="col-md-4 col-xs-12">
                        <label class="fas fa-tag"></label><label>&nbsp;Cargo</label>
                        <input type="text" name="cargo" id="cargo" class="form-control">
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label class="fas fa-suitcase"></label><label>&nbsp;Setor</label>
                        <input type="text" name="setor" id="setor" class="form-control">
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label class="fas fa-credit-card"></label><label>&nbsp;Salário</label>
                        <input type="text" name="salario" id="salario" class="form-control" data-mask="000.000.000.000.000,00", data-mask-reverse="true">
                    </div>
                </div>

                <legend class="mt-4">Dados de Endereço</legend>

                <div class="form-row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-map"></label><label>&nbsp;Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control">
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-list-ol"></label><label>&nbsp;Número</label>
                        <input type="text" name="numero" id="numero" class="form-control">
                    </div>
                </div>

                <div class="form-row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-map-signs"></label><label>&nbsp;Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="form-control">
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-location-arrow"></label><label>&nbsp;Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control">
                    </div>
                </div>

                <div class="form-row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-map-pin"></label><label>&nbsp;Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control">
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label class="fas fa-map-marker"></label><label>&nbsp;Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 text-center">
                <button type="submit" class="btn btn-post zoom">Cadastrar</button>
            </div>
          </div>
        </form>
    </div>
  </div>

    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>

    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>