@extends('layouts/base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/auth.css">
    <link rel="stylesheet" href="css/admi.css">
@endsection

@section('meta-description')
Cette page vous permet d'administrer le site, en ajoutant, modifiant ou supprimant des produits présent sur le site.
@endsection

@section('title')
    labcesi.pau.fr - Administration
@endsection

@section('content')
<?php
$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
$count = $bdd->query('SELECT COUNT(name_product) FROM products');
$total = $count->fetch();
$limite=$total[0];
$i=1;
$j=1;
while ($i <= $limite) {
    /* Sélection des donneés    */
    $titre = $bdd->prepare('SELECT name_product FROM products WHERE ID_product = :variable');
    $titre->execute(array(":variable" => $j));

    $quantity = $bdd->prepare('SELECT quantity FROM products WHERE ID_product = :variable');
    $quantity->execute(array(":variable" => $j));
    
    $description = $bdd->prepare('SELECT description FROM products WHERE ID_product = :variable');
    $description->execute(array(":variable" => $j));
    
    $url = $bdd->prepare('SELECT url_pic FROM products WHERE ID_product = :variable');
    $url->execute(array(":variable" => $j));
    ?>
    <div class="box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-header titre">  
    <?php
    $name_product = $titre->fetch();
    echo $name_product['name_product']. '<br />';
    ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Quantité en stock : ') }}
                            <?php
                             $Quantity = $quantity->fetch();
                             echo $Quantity['quantity']. '<br />';
                            ?>
                            <br/>
                        </label>
                        <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Description du produit : ') }}
                            <?php
                             $Description = $description->fetch();
                             echo $Description['description']. '<br />';
                            ?>
                            <br/>
                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('url du produit : ') }}
                            <?php
                             $Url_pic = $url->fetch();
                             echo $Url_pic['url_pic'];
                            ?><br/>
                            <br/>
                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('matériau : ') }}
                            <?php
                            
                            ?><br/><br/>
                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('couleur disponible : ') }}
                            <?php
                            
                            ?>
                        </label>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 center-bouton">
                            <button type="submit" class="btn btn-primary bouton" href="">
                                    {{ __('Modifier le produit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $j++;
    $i++;
}
?>
<input type="image" class='plus' onclick="window.location.href='/login'"
       src="image/plus.png">

@endsection