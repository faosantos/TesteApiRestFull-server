@extends('layouts.landing')
@section('content')
    @section('body-class', 'bg-dark')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Registre uma conta</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                                    <label for="firstName">Primeiro nome</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                                    <label for="lastName">Último nome</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                            <label for="inputEmail">Endereço de e-mail</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                                    <label for="inputPassword">Senha</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                                    <label for="confirmPassword">Confirmar senha</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block text-white" type="submit" >Registrar</button>
                </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="login.html">Pagina de login</a>
            </div>
          </div>
        </div>
    </div>
@endsection