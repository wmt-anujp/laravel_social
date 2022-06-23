@component('mail::message')
# Hey {{$updateData['name']}}

Your Account info has been updated.

@component('mail::button', ['url' => route("user.Account"),'color'=>'success'])
View Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
