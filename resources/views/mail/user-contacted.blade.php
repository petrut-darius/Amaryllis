<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# Am primit mesajul tău!

Îți mulțumim că ne-ai contactat. Echipa noastră a primit solicitarea ta și te vom contacta în cel mai scurt timp posibil pentru a discuta mai multe detalii despre dorințele tale florale.

<x-mail::panel>
Dacă este o urgență sau dorești să modifici ceva în mesajul trimis, nu ezita să ne răspunzi la acest e-mail.
</x-mail::panel>

O zi plină de culoare,<br>
Echipa {{ config('app.name') }}

@if($token)
<sub style="display: block; text-align: center; margin-top: 20px; color: #718096;">
    Dacă nu mai dorești să primești aceste e-mailuri, te poți <a href="{{ route('newsletter.destroy', ['token' => $token]) }}" style="color: #718096; text-decoration: underline;">dezabona aici</a>.
</sub>
@endif
</x-mail::message>
