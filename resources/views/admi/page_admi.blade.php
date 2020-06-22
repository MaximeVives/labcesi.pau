@extends('layouts.base')
@section('currentpage-css')
    <link href="css/auth.css" rel="stylesheet"type="text/css">
    <link href="css/admi.css" rel="stylesheet"type="text/css">
@endsection

@section('content')

<?php
$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
$count = $bdd->query('SELECT COUNT(name_product) FROM products');
$total = $count->fetch();
$count->closeCursor();
$limite=$total[0];
$i=1;
$j=1;
while ($i <= $limite) {
    /* Sélection des donneés */
    $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
    $titre = $bdd->prepare('SELECT name_product FROM products WHERE ID_product = :variable');
    $titre->execute(array(":variable" => $j));
    $name_product = $titre->fetch();
    $titre->closeCursor();


    $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
    $quantity = $bdd->prepare('SELECT quantity FROM products WHERE ID_product = :variable');
    $quantity->execute(array(":variable" => $j));
    $Quantity = $quantity->fetch();
    $quantity->closeCursor();


    $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
    $description = $bdd->prepare('SELECT description FROM products WHERE ID_product = :variable');
    $description->execute(array(":variable" => $j));
    $Description = $description->fetch();
    $description->closeCursor();


    $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
    $url = $bdd->prepare('SELECT url_pic FROM products WHERE ID_product = :variable');
    $url->execute(array(":variable" => $j));
    $Url_pic = $url->fetch();
    $url->closeCursor();


    $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
    $color = $bdd->prepare('SELECT `name_color` FROM `colors` RIGHT JOIN  products ON products.ID_color  = colors.ID_color WHERE products.ID_product = :variable');
    $color->execute(array(":variable" => $j));
    $color_product = $color->fetch();
    $color->closeCursor();


    $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', 'root');
    $materiau = $bdd->prepare('SELECT `name_material` FROM `materials` RIGHT JOIN  products ON products.ID_material  = materials.ID_material WHERE products.ID_product = :variable');
    $materiau->execute(array(":variable" => $j));
    $materials = $materiau->fetch();
    $materiau->closeCursor();

    ?>
    <div class="box">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header titre">
                <?php
                              echo ($name_product['name_product'].'<br />');

                            ?>
                </div>
                <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Quantité en stock : ') }}
                            <?php

                              echo $Quantity['quantity']. '<br />';
                            ?>
                            <br/>
                            </label>
                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('Description du produit : ') }}
                            <?php
                             echo $Description['description']. '<br /> <br/>';


                            ?>

                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('url du produit : ') }}
                            <?php
                            echo $Url_pic['url_pic'];


                            ?><br/><br/>

                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('matériau : ') }}
                            <?php
                            echo $materials['name_material'];


                            ?><br/><br/>

                            <label class="col-md-4 col-form-label text-md-right sous-partie">{{ __('couleur disponible : ') }}
                            <?php
                            echo $color_product['name_color'];


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
    </div>
    <?php
    $j++;
    $i++;
}

?>
<input type="image" class='plus' onclick="window.location.href='/ajout_produit'"src="image/plus.png">

    @endsection
