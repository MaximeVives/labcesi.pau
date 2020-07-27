@component('mail::message')
# Récapitulatif de la commande à valider

Une nouvelle commande a été effectuée sur le site LabCESI, vous retrouverez ci-dessous le récapitulatif de la commande à valider:

@component('mail::table',['order'=> $order,'product'=>$product,'color'=>$color])
| Nom                    | Prénom               | nom du produit              | Couleur                | quantité             | 
|:----------------------:|:--------------------:|:---------------------------:|:----------------------:|:--------------------:|
| {{ $user->lastname }} | {{ $user->firstname }}| {{ $product->name_product }}|{{ $color->name_color }}|{{ $order->quantity_order }}|
@endcomponent

Veuillez cliquer ici afin d'accéder aux commandes en attente :
@component('mail::button', ['url' => url('/').'/liste-commande'])
Liste des commandes
@endcomponent



LabCESI Pau

ARNAUD Marc-Alexandre (<a href="mailto:maarnaud@cesi.fr">maarnaud@cesi.fr</a>)<br>
CHABRIER Olivier (<a href="mailto:ochabrier@cesi.fr">ochabrier@cesi.fr</a>)<br>

Tél : 0559123456<br>
Fax : 0558123456

<img src="{{asset('/image/logo.svg')}}" style=" width: 15%; float: right;">
@endcomponent