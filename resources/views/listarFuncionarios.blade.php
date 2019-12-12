@extends('layout')

    <title>Listagem de funcionários</title>

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
            <ul class="navbar-nav mr-auto">
            </ul>

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
        &nbsp;<a class="navbar-brand" href="#">&nbsp;<label class="fas fa-th-list">&nbsp;Listagem de funcionários</label></a>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text text-white">
                <a href="{{route('funcionarios.create')}}"><button class="btn btn-outline-primary"><label class="fas fa-edit"></label>&nbsp;Cadastrar</button></a>
            </span>
        </div>
      </nav>

      <div class="card mt-1">
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

            <div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Salário</th>
                            <th colspan="2">Ação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        @foreach($funcionarios as $funcionario)
                        
                            <tr>
                                <th scope="row">{{ $funcionario->id }}</th>
                                <td>{{ $funcionario->nome }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>{{ $funcionario->cargo }}</td>
                                <td>{{ $funcionario->setor }}</td>
                                <td>{{ $funcionario->salario }}</td>
                                <td>
                                    <button class="btn btn-primary fas fa-pencil-alt float" data-toggle="modal" data-target="#modal" style="padding: 12px;" onClick="busca_usuario({{ $funcionario }})"></button>
                                    <form action="{{route('funcionarios.destroy', $funcionario->id)}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger fas fa-trash" style="padding: 12px;"></button>
                                    </form>
                                </td> 
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"><i class="fas fa-edit"></i>&nbsp;Alterar dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @foreach($funcionarios as $funcionario)
            
                <form action="{{route('funcionarios.update', $funcionario->id)}}" method="post">
                    @method('PUT')
                    {{ csrf_field() }}

                

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
                            <div class="col-md-2 col-xs-12">
                                <label class="fas fa-address-book"></label><label>&nbsp;Id</label>
                                <input type="text" name="id" id="id" class="form-control" disabled>
                            </div>

                            <div class="col-md-5 col-xs-12">
                                <label class="fas fa-user"></label><label>&nbsp;Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>

                            <div class="col-md-5 col-xs-12">
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
                                <input type="text" name="rg" id="rg" class="form-control">
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

                    <div class="modal-footer">
                        <button type="sumit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
  </div>
  
    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        function busca_usuario(funcionario){
            document.getElementById('id').value = funcionario.id;
            document.getElementById('nome').value = funcionario.nome;
            document.getElementById('email').value = funcionario.email;
            document.getElementById('data_nascimento').value = funcionario.data_nascimento;
            document.getElementById('rg').value = funcionario.rg;
            document.getElementById('cpf').value = funcionario.cpf;
            document.getElementById('rg').value = funcionario.rg;
            document.getElementById('celular').value = funcionario.celular;
            document.getElementById('telefone').value = funcionario.telefone;
            document.getElementById('cargo').value = funcionario.cargo;
            document.getElementById('setor').value = funcionario.setor;
            document.getElementById('salario').value = funcionario.salario;
            document.getElementById('logradouro').value = funcionario.logradouro;
            document.getElementById('numero').value = funcionario.numero;
            document.getElementById('complemento').value = funcionario.complemento;
            document.getElementById('bairro').value = funcionario.bairro;
            document.getElementById('cidade').value = funcionario.cidade;
            document.getElementById('estado').value = funcionario.estado;
        }
    </script>