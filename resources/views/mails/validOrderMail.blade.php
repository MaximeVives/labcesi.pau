@component('mail::message')
# Récapitulatif de votre commande

Le Lab'Cesi de Pau vous remercie d'avoir passé la commande, vous retrouverez ci-dessous le récapitulatif de votre commande:

@component('mail::table',['order'=> $order,'product'=>$product,'color'=>$color])
| nom du produit              | Couleur                | quantité             | date de livraison  | lieu de livraison                                          |
|:---------------------------:|:----------------------:|:--------------------:|:------------------:|:----------------------------------------------------------:|
| {{ $product->name_product }}|{{ $color->name_color }}|{{ $order->quantity_order }}|{{$order->date_delivery}}|8 Rue des Frères Charles et Alcide d'Orbigny, 64000 Pau|
@endcomponent

Merci pour votre commande,

LabCESI Pau

ARNAUD Marc-Alexandre (<a href="mailto:maarnaud@cesi.fr">maarnaud@cesi.fr</a>)<br>
CHABRIER Olivier (<a href="mailto:ochabrier@cesi.fr">ochabrier@cesi.fr</a>)<br>

Tél : 0559123456<br>
Fax : 0558123456

<img src="{{asset('/image/logo.svg')}}" style=" width: 15%; float: right;">
@endcomponent
