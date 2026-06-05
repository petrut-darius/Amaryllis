<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# La mulți ani de 8 Martie! 🌸

Astăzi celebrăm frumusețea, delicatețea și puterea tuturor femeilor. Vă dorim o primăvară superbă, plină de zâmbete și flori care să vă lumineze ziua.

Ești specială și meriți cele mai frumoase flori din lume!

<x-mail::button :url="config('app.url')">
Alege un buchet special
</x-mail::button>

Cu admirație,<br>
Echipa {{ config('app.name') }}

@if($token)
<sub style="display: block; text-align: center; margin-top: 20px; color: #718096;">
    Dacă nu mai dorești să primești aceste e-mailuri, te poți <a href="{{ route('newsletter.destroy', ['token' => $token]) }}" style="color: #718096; text-decoration: underline;">dezabona aici</a>.
</sub>
@endif
</x-mail::message>
