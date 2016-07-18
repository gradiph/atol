<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8; text/html" />
	<title>@yield('title')Admin Sistem Informasi Geografis</title>
    {{ Html::style(asset('css/bootstrap.min.css')) }}
    {{ Html::script(asset('js/jquery-2.2.3.min.js')) }}
    {{ Html::script(asset('js/bootstrap.min.js')) }}
    {{ Html::style(asset('js/jquery-ui-1.11.4.custom/jquery-ui.min.css')) }}
    {{ Html::script(asset('js/jquery-ui-1.11.4.custom/jquery-ui.min.js')) }}
</head>
<body>
	<header>@include('template.header')</header>
    <div class="content">@yield('content')</div>
    <br />
    <footer>@include('template.footer')</footer>
</body>
</html>