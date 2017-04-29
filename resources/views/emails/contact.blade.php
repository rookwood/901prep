@component('mail::message')
# Contact form message

### Sent on {{ $date }}

{{ $message }}

Sent by {{ $name }} from {{ $sender }}
Phone {{ $phone }}
@endcomponent
