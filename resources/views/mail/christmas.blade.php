<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# Crăciun Fericit! 🎄

În această perioadă magică a anului, echipa Amaryllis vă dorește sărbători pline de lumină, căldură și miros de brad. Fie ca spiritul Crăciunului să vă aducă bucurie alături de cei dragi.

Vă mulțumim că ați ales să aduceți frumusețea florilor noastre în casele dumneavoastră.

<x-mail::button :url="config('app.url')">
Descoperă colecția de iarnă
</x-mail::button>

Sărbători de poveste,<br>
Echipa {{ config('app.name') }}

@if($token)
<sub style="display: block; text-align: center; margin-top: 20px; color: #718096;">
    Dacă nu mai dorești să primești aceste e-mailuri, te poți <a href="{{ route('newsletter.destroy', ['token' => $token]) }}" style="color: #718096; text-decoration: underline;">dezabona aici</a>.
</sub>
@endif
</x-mail::message>
