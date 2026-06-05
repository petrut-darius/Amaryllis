<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# Paște Fericit! 🕊️

Lumina Învierii să vă aducă în suflet liniște, speranță și multă bucurie. Vă dorim un Paște minunat, petrecut în armonie alături de familie și prieteni.

Fie ca această primăvară să înflorească în viața dumneavoastră la fel de frumos ca aranjamentele noastre.

<x-mail::button :url="config('app.url')">
Flori de primăvară
</x-mail::button>

Cu mult drag,<br>
Echipa {{ config('app.name') }}

@if($token)
<sub style="display: block; text-align: center; margin-top: 20px; color: #718096;">
    Dacă nu mai dorești să primești aceste e-mailuri, te poți <a href="{{ route('newsletter.destroy', ['token' => $token]) }}" style="color: #718096; text-decoration: underline;">dezabona aici</a>.
</sub>
@endif
</x-mail::message>
