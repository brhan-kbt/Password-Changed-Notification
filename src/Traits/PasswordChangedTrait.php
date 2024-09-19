<?php

namespace Brhn\PasswordChangedNotification\Traits;

use Brhn\PasswordChangedNotification\Mail\PasswordChangedNotification;
use Brhn\PasswordChangedNotification\Observers\PasswordChangedObserver;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

trait PasswordChangedTrait
{
    public static function booted()
    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Register the observer which will trigger the mail sending
     *
     * @return void
     */
    /******  cf374ef6-cf4c-461c-8a93-872d717e732a  *******/
    {
        static::observe(PasswordChangedObserver::class);
    }

    public function passwordColumnName(): string
    {
        return 'password';
    }

    public function emailColumnName(): string
    {
        return 'email';
    }

    public function passwordChangedNotification(): Mailable
    {
        return new PasswordChangedNotification;

    }

    public function isPasswordChanged(): bool
    {
        return $this->wasChanged($this->passwordColumnName());
    }

    public function sendNotificationWithQueue(): bool
    {
        return false;
    }

    public function sendPassswordChangedNotification()
    {
        if (! $this->isPasswordChanged()) {
            return;
        }
        $mail = Mail::to($this->getRawOriginal($this->emailColumnName()));

        if ($this->sendNotificationWithQueue()) {
            Log::info('queue');
            $mail->queue($this->passwordChangedNotification());

            return;
        } else {
            Log::info('direct');
            $mail->send($this->passwordChangedNotification());
        }
    }
}
