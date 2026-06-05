<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# O zi a îndrăgostiților plină de iubire! ❤️

De Valentine's Day, lăsați florile să vorbească în locul dumneavoastră. Vă dorim o zi plină de gesturi frumoase, momente romantice și multă iubire.

Iubirea este ca o floare: trebuie îngrijită cu dragoste pentru a înflori în fiecare zi.

<x-mail::button :url="config('app.url')">
Surprinde persoana iubită
</x-mail::button>

Cu dragoste,<br>
Echipa {{ config('app.name') }}

@if($token)
<sub style="display: block; text-align: center; margin-top: 20px; color: #718096;">
    Dacă nu mai dorești să primești aceste e-mailuri, te poți <a href="{{ route('newsletter.destroy', ['token' => $token]) }}" style="color: #718096; text-decoration: underline;">dezabona aici</a>.
</sub>
@endif
</x-mail::message>
