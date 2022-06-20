@component('mail::message')
# LinkedIn Invitation

Join Us on LinkedIn

@component('mail::button', ['url' => 'https://www.linkedin.com/feed/','color'=>'success'])
LinkedIn
@endcomponent
<h1>{{$mailData['url']}}</h1>
<h1>{{$mailData['title']}}</h1>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
