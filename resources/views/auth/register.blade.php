@extends('layout')

    <title>Cadastro de administrador</title>

@section('content')

<div class="container">

    <div class="login">
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf
            <img class="logo" src="{{asset('img/logo.png')}}">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nome:">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 mt-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email:">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 mt-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Senha:">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 mt-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar senha:">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 mt-1">
                    <button type="submit" id="loginBtn" class="btn btn-primary btn-block">Cadastrar</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="/login" style="color: white;">Possui uma conta cadastrada? Logue-se por aqui!</a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    body{
        background-image: url("../img/fundo.jpg");
        background-repeat: no-repeat;   
    }
</style>  