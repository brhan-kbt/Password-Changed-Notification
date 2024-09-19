<?php

use Brhn\PasswordChangedNotification\Tests\Model\User;
use Illuminate\Support\Facades\Mail;

it('can send mail to the user when password is changed', function () {

    Mail::fake();

    $user = User::factory()->create();

    $user->password = bcrypt('password');

    $user->save();

    Mail::assertSent($user->passwordChangedNotification()::class);
});

it('can not send mail to the user when password is not changed', function () {

    Mail::fake();

    $user = User::factory()->create();

    $user->name = 'New Name';

    $user->save();

    Mail::assertNotSent($user->passwordChangedNotification()::class);
});
