@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'https://laracast.com'])
Start browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some inspiration quote to go here.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent