<x-mail::message>
Hi, {{$user->getRawOriginal( $user->nameColumnName())}}
<br/>
<br/>
The password for your {{ config('app.name') }} account has been changed.
Please contact  {{ config('app.name') }} support team if you have any questions.
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
