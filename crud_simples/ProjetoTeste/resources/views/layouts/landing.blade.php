<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema que gêrencia os alunos"/>
        <meta name="theme-color" content="#000000"/>
        <title>{{config('app.name')}} - @yield('title', 'Login')</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>
    <body class="@yield("body-class")">
        @yield('content')
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>