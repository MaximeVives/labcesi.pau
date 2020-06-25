@extends('layouts/base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/fiche_prod.css">
    <script lang="javascript" src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
    {{-- <script src="../js/fiche_produit.js"></script> --}}
@endsection

@section('meta-description')
Cette page vous fait découvrir la création CESI :. Nous espérons que ca vous plaira. 
@endsection

@section('title')
    labcesi.pau.fr - Produits
@endsection

{{-- @section('page-title')
    PRODUITS : {{ $n_prod }}
@endsection --}}

@section('content')
    <div class="prod-content">
        <div class="prod-fiche-left">
            <img src="storage/image/{{ $data_produit->url_pic }}" alt="visiere_cesi">
        </div>
        <div class="prod-fiche-right">
            <div class="prod-fiche-title">
                <h3>{{ $data_produit->name_product }}</h3>
            </div>
            <div class="prod-fiche-descr">
                <p>{{ $data_produit->description}}</p><br><br>
                @foreach ($data_material as $material)
                <p>Ce produit est fait en {{ $material->name_material }}.</p>
                @endforeach
                
            </div>

                {{-- Pour la couleur et la quantité il faudra faire une autre requete SQL
                    Afin d'avoir la table couleur/qty en fonction de l'id produit
                    Ce qui est plus simple que de récupérer la couleur/qty depuis produit --}}

                <div class="prod-fiche-detail">
                    <div class="prod-fiche-list-color">
                        <select id="color-select" class="color" name="color-select" required>
                            <option id="default_size" value="0" disabled selected>Couleur :</option>
                            @foreach ($data_color as $color)
                                <option value="{{ $color->name_color }}">{{ $color->name_color }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="prod-fiche-list-quantity">
                        <select id="quantity-select" class="qty" name="quantity-select" required>
                            <option id="default_qty" value="0" disabled selected>Quantité :</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="prod-fiche-addcart">
                    <form action="{{ route('cart.store') }}" method="POST" onsubmit="return verifForm(this)">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data_produit->ID_product }}">
                        <input type="hidden" name="name" value="{{ $data_produit->name_product }}">
                        <input type="hidden" name="color" class="color" value="">
                        <input type="hidden" name="material" value="{{ $material->name_material }}">
                        <input type="hidden" name="qty" class="qty" value="">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

        function verifName(champ)
        {
            if(champ.value.length < 1 || champ.value.length > 250)
            {
                surligne(champ, true);
                return false;
            }
            else
            {
                surligne(champ, false);
                return true;
            }
        }

        function verifText(champ)
        {
            if(champ.value < 1 || champ.value > 65000)
            {
                surligne(champ, true);
                return false;
            }
            else
            {
                surligne(champ, false);
                return true;
            }
        }

        function surligne(champ, erreur)
        {
        if(erreur){
            if (champ.name == "color") {
                document.getElementById("color-select").style.backgroundColor = "#c40000";
            }
            else{
                document.getElementById("quantity-select").style.backgroundColor = "#c40000";
            }

            console.log(champ);
        }
        else
        if (champ.name == "color") {
                document.getElementById("color-select").style.backgroundColor = "transparent";
            }
            else{
                document.getElementById("quantity-select").style.backgroundColor = "transparent";
            }
        }

        function verifForm(f)
        {
            var nameOk = verifName(f.color);
            var textOk = verifText(f.qty);
            
            if(nameOk && textOk){
                return true;
            }
            else
            {
                alert("Veuillez remplir correctement tous les champs");
                return false;
            }
        }

        // function verifFormModif(f, statut)
        // {
        //     var nameOk = verifName(f.nameDefModif);
        //     var textOk = verifText(f.textDefModif);
            
        //     if(nameOk && textOk){
        //         sendDef(statut);
        //         return true;
        //     }
        //     else
        //     {
        //         alert("Veuillez remplir correctement tous les champs");
        //         return false;
        //     }
        // }
        
</script>
        



    <script lang="javascript">
        $(document).ready(function(){
            $("select.qty").change(function(){
                var selectedQty = $(this).children("option:selected").val();
                $(".qty").val(selectedQty);
            });
        });
        $(document).ready(function(){
            $("select.color").change(function(){
                var selectedColor = $(this).children("option:selected").val();
                $(".color").val(selectedColor);
            });
        });
    </script>  
@endsection