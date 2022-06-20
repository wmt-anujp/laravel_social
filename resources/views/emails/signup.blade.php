@component('mail::message')
# Hey {{$mailData['name']}} welcome to Instagram

Your account has been created successfully

@component('mail::button', ['url' => route("user.Feed"),'color'=>'success'])
Visit Instagram
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
