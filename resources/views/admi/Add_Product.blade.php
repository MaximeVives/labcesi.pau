@extends('layouts.base')
@section('currentpage-css')
    <link href="css/auth.css" rel="stylesheet"type="text/css">
    <link href="css/admi.css" rel="stylesheet"type="text/css">
@endsection

@section('content')
<!doctype html>
<head>
<body>
<div class="registerbox">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header titre">{{ __('Ajouter un produit') }}</div>
                    <div class="card-body">

                    <form method="POST" action="/envoie" onsubmit="return verifForm(this,'add')">
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name_product" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('nom du produit') }}</label>

                            <div class="col-md-6">
                                <input id="name_product" type="text" value="{{ old('name_product') }}" name="name_product">
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" value="{{ old('quantity') }}" name="quantity" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" value="{{ old('description') }}"  name="description" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_pic" class="col-md-4 col-form-label text-md-right sous-partie">{{ __('url de l image du produit') }}</label>

                            <div class="col-md-6">
                                <input id="url_pic" type="file" value="{{ old('url_pic') }}"  name="url_pic" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 center-bouton">
                            <button type="submit" class="btn btn-primary"> {{ __('Ajout d un produit') }}</button>     
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
