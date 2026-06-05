<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# Bun venit în universul Amaryllis!

Vă mulțumim că v-ați abonat la newsletter-ul nostru. Suntem încântați să vă avem alături și promitem să vă ținem la curent cu cele mai frumoase aranjamente florale, oferte speciale și noutăți din atelierul nostru.

<x-mail::button :url="config('app.url')">
Vizitează site-ul nostru
</x-mail::button>

Cu drag,<br>
Echipa {{ config('app.name') }}

@if($token)
<sub style="display: block; text-align: center; margin-top: 20px; color: #718096;">
    Dacă nu mai dorești să primești aceste e-mailuri, te poți <a href="{{ route('newsletter.destroy', ['token' => $token]) }}" style="color: #718096; text-decoration: underline;">dezabona aici</a>.
</sub>
@endif
</x-mail::message>
