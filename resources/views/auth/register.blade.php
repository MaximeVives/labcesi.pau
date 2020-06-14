@extends('layouts.app')

@section('content')
<!doctype html>
<head>
<body>
<div class="registerbox">
    <img src="image/user.png" class="avatar">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header titre">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Entrer votre prénom" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname"  autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Entrer votre nom" value="{{ old('lastname') }}"  required autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Adresse mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer votre adresse mail" value="{{ old('email') }}" required autocomplete="email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Entrer votre mot de passe" required autocomplete="new-password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Confirmer le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-entrer votre mot de passe" required autocomplete="new-password" >
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="ID_type" class="col-md-4 col-form-label text-md- sous-partie">{{ __('Statut') }}</label>

                            <div class="col-md-6">
                                <select name="ID_type" class="form-control statut-roll">
                                    <option value="1">Particulier</option>
                                    <option value="2">Professionnel</option>
                                    <option value="3">Entreprise</option>
                                </select>
                                @error('ID_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 center-bouton">
                                <button type="submit" class="btn btn-primary bouton">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</boby>
</html>
@endsection
