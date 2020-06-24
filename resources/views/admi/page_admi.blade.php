@extends('layouts.base')
@section('currentpage-css')
    <link href="css/auth.css" rel="stylesheet"type="text/css">
    <link href="css/admi.css" rel="stylesheet"type="text/css">
@endsection

@section('content')
    <div class="content">
        @foreach ($data_produit as $produit )
        <div class="box">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/update"  method="POST">
                    {{ csrf_field() }}

                    <div class="card-header titre">
                    <input id="name_product" type="text" class="form-control " placeholder="{{ $produit->name_product }}" value="{{ $produit->name_product }}" name="name_product" required>
                    <input id="ID_product" type="text" class="form-control " placeholder="{{ $produit->ID_product }}" value="{{ $produit->ID_product }}" name="ID_product" style="display: none;">

                    </div>
                    <div class="form-group row">
                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Quantité en stock : ') }} </br>
                                <input id="quantity" type="text" class="form-control " placeholder="{{ $produit->quantity }}" value="{{ $produit->quantity }}" name="quantity" required><br/><br/>

                                <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Description du produit : ') }}
                                <input id="description" type="text" class="form-control" placeholder="{{ $produit->description }}" value="{{ $produit->description }}" name="description" required><br/><br/>

                                </label>
                                <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('url du produit : ') }}<br/>
                                <input id="url_pic" type="text" class="form-control" placeholder="{{ $produit->url_pic }}" value="{{ $produit->url_pic }}" name="url_pic" required><br/><br/>

                                </label>
                                <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('matériau : ') }}<br/>
                                @foreach ($data_material as $material )
                                <p id="name_material">{{ $material->name_material }}</p>
                                @endforeach
                                <br/><br/>
                                </label>
                                <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('couleur disponible : ') }}</br>

                                <ul class="list-color">
                                    @foreach ($data_color as $color )
                                    {{-- <input id="name_color" type="text" class="form-control" placeholder=" {{ $color->name_color }}" value=" {{ $color->name_color }}" name="name_color"></br> --}}
                                    <li class="point-color">{{ $color->name_color }}</li>
                                    @endforeach
                                </ul>

                            </label>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 center-bouton">
                                    <button type="submit" class="btn btn-primary bouton">
                                        Modifier
                                    </button>
                                </form>
                                <form action="/delete"  method="POST">
                                    {{ csrf_field() }}
                                    <input id="ID_product" type="text" class="form-control"value="{{ $produit->ID_product }}" style="display: none;" name="ID_product">
                                    <button type="submit" class="btn-suppr">
                                        <img src="image/croix_rouge_2.png" class='croix' alt="bouton pour supprimer">
                                    </button>
                                </form>
                            </div>
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
        </div>
        @endforeach

</div>

<div class="add-prod">
<a class='plus' href="/ajout_produit"><img src="image/plus.png" alt=""></a>
<span>Ajouter un produit</span>
</div>

@if(session()->has('add'))
<script lang="javascript">
    alert("Votre Produit a été ajouté");
</script>
@endif

@if(session()->has('modif'))
    <script lang="javascript">
        alert("Votre produit a été mis à jour");
    </script>
@endif

@if(session()->has('suppr'))
    <script lang="javascript">
        alert("Votre produit a bien été supprimé");
    </script>
@endif
@endsection
