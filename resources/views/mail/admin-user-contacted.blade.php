<x-mail::message>
<div style="text-align: center; margin-bottom: 30px;">
<img src="{{ config('app.url') }}/amaryllis_logo.png" alt="{{ config('app.name') }}" width="150" style="display: inline-block;">
</div>

# Un nou mesaj a fost trimis prin formularul de contact

Mesajul a fost trimis de: **{{ $contact->name }}** ({{ $contact->email }})

<x-mail::panel>
**Subiect:** {{ $contact->subject }} <br>
**Telefon:** {{ $contact->phone ?? 'Nespecificat' }} <br>
**Data Evenimentului:** {{ $contact->event_date ?? 'Nespecificată' }}
</x-mail::panel>

**Mesaj:**
{{ $contact->message }}

@if($contact->vision)
**Viziune:**
{{ $contact->vision }}
@endif

Mulțumim,<br>
{{ config('app.name') }}
</x-mail::message>
