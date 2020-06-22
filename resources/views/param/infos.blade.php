@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/auth.css">
@endsection

@section('meta-description')
Sur cette page, vous retrouverez tous les produits Lab'cesi de Pau. Visière cesi et stylet cesi sont nos seuls produits pour le moment...
@endsection

@section('title')
    labcesi.pau.fr - Mes infos
@endsection

@section('page-title')
    Mes Informations
@endsection

@section('content')
    <div class="registerbox">
        <form method="POST" action="/modification">
            {{ csrf_field() }}
            {{-- <input name="firstname" type="text" placeholder="{{ Auth::user()->firstname }}">
            <input name="lastname" type="text" placeholder="{{ Auth::user()->lastname }}">
            <input name="email" type="email" placeholder="{{ Auth::user()->email }}">
            <input name="password" type="password" placeholder="Mot de passe">
            <input name="confirm-password" type="password" placeholder="Confirmer votre mot de passe"> --}}

            <div class="form-group">
                <div class="titre">
                    <h3 class="titre">Modifier mes données</h3>
                </div>
                <div class="field">
                    <label for="email" class="col-md-4 col-form-label text-md-right sous-partie">Adresse Mail</label>

                    <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}" required autocomplete="email" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label sous-partie">Nouveau mot de passe</label>
                    <div class="control">
                        <input class="input" type="password" name="password">
                    </div>
                    @if($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            
                <div class="field">
                    <label class="label sous-partie">Mot de passe (confirmation)</label>
                    <div class="control">
                        <input class="input" type="password" name="password_confirmation">
                    </div>
                    @if($errors->has('password_confirmation'))
                        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>
            </div>
        
            <div class="field">
                <div class="control">
                    <p class="center-bouton"><button class="button is-link" type="submit">Modifier mon mot de passe</button></p>
                </div>
            </div>
        </form>
    </div>

@endsection