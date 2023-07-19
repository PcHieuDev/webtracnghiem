@component('mail::message')
# CHào mừng đến với {{ config('app.name') }}

- {{ $details['message'] }}

@component('mail::button', ['url' => ''])
Ghé thăm trang web của chúng tôi
@endcomponent

Cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
