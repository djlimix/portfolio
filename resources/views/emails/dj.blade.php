@component('mail::message')
# Nová správa z kontaktného formuláru z dj.limix.eu

Od:
<br>
{{ $data['name'] }} &lt;{{ $data['email'] }}&gt;
<br>
Správa:
<br>
{{ $data['message'] }}
<br>
<a href="mailto:{{ $data['email'] }}?Subject=Contact form from dj.limix.eu&body=Hi {{ $data['name'] }},<br>thank you for your message:<br>{{ $data['message'] }}<br>">Click here to reply</a>


{{ config('app.name') }}
@endcomponent
