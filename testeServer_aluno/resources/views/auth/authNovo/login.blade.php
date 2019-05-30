@extends('layouts.landing')
@section('content')
@section('body-class', 'bg-success')
<div class="container">
    <div>
		<div class="card card-login mx-auto mt-5">
			<div class="card-header text-center">
				<img 
					src="./images/ima_mario.jpg"
					alt="LOGO"
					style="height:100px;"
				/>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div class="form-group">
						<div class="form-label-group">
						<input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<label for="inputEmail">Endereço de e-mail</label>
						</div>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="form-group">
						<div class="form-label-group">
						<input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						<label for="inputPassword">Senha</label>
						</div>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
  	</div>
</div>
@endsection
