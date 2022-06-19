@component('mail::message')
# Welcome to the first Newsletter

Dear {{$email}},

We look forward to communicating more with you. For more information visit our blog.

@component('mail::button', ['url' => 'https://www.itsolutionstuff.com/post/laravel-8-mail-laravel-8-send-email-tutorialexample.html','color'=>'success'])
Blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
