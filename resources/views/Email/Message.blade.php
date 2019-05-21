@component('mail::message')
# Introduction

The body of your message.
message from mohamed
<hr>
{{$message}}
@component('mail::button', ['url' => url('students')])
click to go to website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
