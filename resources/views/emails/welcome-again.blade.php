@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'https://www.laracasts.com'])
Start learning
@endcomponent

@component('mail::panel', ['url' => 'https://www.laracasts.com'])
Add some text here.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
