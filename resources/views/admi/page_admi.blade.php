    @extends('layouts.base')
    @section('currentpage-css')
        <link href="css/auth.css" rel="stylesheet"type="text/css">
        <link href="css/admi.css" rel="stylesheet"type="text/css">
    @endsection

    @section('content')

            @foreach ($data_produit as $produit )  
            <div class="box">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card-header titre">
                        <input id="name_product" type="text" class="form-control " placeholder="{{ $produit->name_product }}" value="{{ $produit->name_product }}" name="name_product">

                        
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Quantité en stock : ') }}</br>
                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control " placeholder="{{ $produit->quantity }}" value="{{ $produit->quantity }}" name="quantity"><br/><br/>
                                    
                                    </label>
                                    <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Description du produit : ') }}
                                    <input id="description" type="text" class="form-control" placeholder="{{ $produit->description }}" value="{{ $produit->description }}" name="description"><br/><br/>
                                    
                                    </label>
                                    <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('url du produit : ') }}<br/>
                                    <input id="url_pic" type="text" class="form-control" placeholder="{{ $produit->url_pic }}" value="{{ $produit->url_pic }}" name="url_pic"><br/><br/>
                                    
                                    </label>
                                    <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('matériau : ') }}<br/>
                                    @foreach ($data_material as $material )
                                    <input id="name_material" type="text" class="form-control" placeholder=" {{ $material->name_material }}" value=" {{ $material->name_material }}" name="name_material">
                                    @endforeach
                                    <br/><br/>
                                    </label>
                                    <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('couleur disponible : ') }}</br> 
                                    @foreach ($data_color as $color ) 
                                    <input id="name_color" type="text" class="form-control" placeholder=" {{ $color->name_color }}" value=" {{ $color->name_color }}" name="name_color"></br>                                                              
                                    @endforeach
                                </label>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 center-bouton">
                                    <form action="/update"  method="POST">
                                    @csrf 
                                        <button type="submit" value="{{ $produit->ID_product }}" class="btn btn-primary bouton">
                                            {{ __('Modifier le produit') }}
                                         </button>
                                    </form>     
                                    <form action="/delete"  method="POST">
                                    @csrf
                                        <input id="ID_product" type="text" class="form-control"value="{{ $produit->ID_product }}" style="display: none;" name="ID_product">
                                    <button type="submit" class=".btn-suppr">
                                    <img src="image/croix_rouge.png" class='croix' alt="bouton pour supprimer">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
            @endforeach
    <input type="image" class='plus' onclick="window.location.href='/ajout_produit'"src="image/plus.png">
    @endsection