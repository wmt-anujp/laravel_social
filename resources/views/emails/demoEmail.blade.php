@component('mail::message')
# LinkedIn Invitation

Join Us on LinkedIn

@component('mail::button', ['url' => 'https://www.linkedin.com/feed/','color'=>'success'])
LinkedIn
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
