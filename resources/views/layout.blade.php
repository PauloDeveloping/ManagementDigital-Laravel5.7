<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Crud Laravel</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/fontawersome-5.10.2/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/fontawersome-5.10.2/all.min.js')}}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery/jquery.mask.min.js')}}"></script>
        <script src="{{asset('js/jquery/additional-methods.min.js')}}"></script>
        <script src="{{asset('js/jquery/jquery.validate.min.js')}}"></script>
    </body>
</html>