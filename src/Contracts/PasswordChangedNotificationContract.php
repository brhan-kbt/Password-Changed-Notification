<?php

namespace Brhn\PasswordChangedNotification\Contracts;

interface PasswordChangedNotificationContract
{
    public function passwordColumnName();

    public function emailColumnName();

    public function passwordChangedNotification();

    public function isPasswordChanged();

    public function sendNotificationWithQueue();

    public function sendPassswordChangedNotification();
}
