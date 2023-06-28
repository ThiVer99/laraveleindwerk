<x-mail::message>
<h1>Message from website:</h1>
    <x-mail::panel>
        <p>Name: {{$data['name']}}</p>
        <p>Email: {{$data['email']}}</p>
        <p>Phone: {{$data['phone']}}</p>
        <p>Message: {{$data['message']}}</p>
    </x-mail::panel>

{{--    kleuren zijn primary, succes en error hieronder--}}
<x-mail::button :url="'http://127.0.0.1:8000/'" color="success">
Bezoek onze site
</x-mail::button>

Bedankt,<br>
Het team van {{ config('app.name') }}
</x-mail::message>
