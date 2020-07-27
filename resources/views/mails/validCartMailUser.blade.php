@component('mail::message')
# Récapitulatif de la commande à valider

Merci pour votre commande sur le site LabCESI, vous recevrez bientôt la date et le lieu pour la réception de votre commande.
Voici un récapitulatif :

@component('mail::table',['order'=> $order,'product'=>$product,'color'=>$color])
| Nom                    | Prénom               | nom du produit              | Couleur                | quantité             | 
|:----------------------:|:--------------------:|:---------------------------:|:----------------------:|:--------------------:|
| {{ $user->lastname }} | {{ $user->firstname }}| {{ $product->name_product }}|{{ $color->name_color }}|{{ $order->quantity_order }}|
@endcomponent

Veuillez cliquer ici afin d'accéder a vos commandes :
@component('mail::button', ['url' => url('/').'/mes-commandes'])
Liste des commandes
@endcomponent



LabCESI Pau

ARNAUD Marc-Alexandre (<a href="mailto:maarnaud@cesi.fr">maarnaud@cesi.fr</a>)<br>
CHABRIER Olivier (<a href="mailto:ochabrier@cesi.fr">ochabrier@cesi.fr</a>)<br>

Tél : 0559123456<br>
Fax : 0558123456

<img src="{{asset('/image/logo.svg')}}" style=" width: 15%; float: right;">
@endcomponent