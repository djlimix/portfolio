@component('mail::message')
# New message from <a href="//limixmedia.com">limixmedia.com</a>

From:
<br>
{{ $data['name'] }} &lt;{{ $data['email'] }}&gt;
<br>
Správa:
<br>
{{ $data['message'] }}
{{--<br>--}}
{{--<a href="mailto:{{ $data['email'] }}?Subject=Contact form from limixmedia.com&body=Hi {{ $data['name'] }},<br>thank you for your message:<br>{{ $data['message'] }}<br>">Click here to reply</a>--}}


{{--{{ config('app.name') }}--}}
@endcomponent
