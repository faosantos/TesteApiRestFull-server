

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">

 {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
 {{-- <title>Registro de usuários</title> --}}
 <title>@yield('title')Testando App</title>
 
  <!-- Scripts de algumas funcionalidades como o placeholder -->
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  {{-- <script src="{{ asset('js/form.js') }}"></script> --}}

<!-- Styles -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

		<div id="app">
				<nav class="navbar navbar-expand-md navbar-light navbar-laravel">	
					<div class="container">
						<a class="nav-link1" href="{{ url('/') }}">
							{{-- {{ config('app.name', 'Laravel') }} --}}
							Home
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
							<span class="navbar-toggler-icon"></span>
						</button>
		
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<!-- Lado Esquerdo da Navbar -->
							<ul class="navbar-nav mr-auto">
		
							</ul>
		
							<!-- Lado direito da navbar -->
							<ul class="navbar-nav ml-auto">
								<!-- Authentication Links -->
								@guest
									<li class="nav-item">
										<a class="nav-link1" href="{{ route('login') }}">{{ __('Login') }}</a>
									</li>
									@if (Route::has('register'))
										<li class="linha-vertical">
												<a class="nav-link1" href="{{ url('/') }}">
													{{-- {{ config('app.name', 'Laravel') }} --}}
													sair
												</a>
										</li>
									@endif
								@else
									<li class="nav-item dropdown">
										<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
											{{ Auth::user()->name }} <span class="caret"></span>
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
								@endguest
							</ul>
						</div>
					</div>
				</nav>
{{-- <main class="py-4"> --}}
				<main>
					@yield('content')
				</main>
		</div>
</body>
</html>
        