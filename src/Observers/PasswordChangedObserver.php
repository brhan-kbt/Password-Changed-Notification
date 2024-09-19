<?php

namespace Brhn\PasswordChangedNotification\Observers;

use Brhn\PasswordChangedNotification\Contracts\PasswordChangedNotificationContract;

class PasswordChangedObserver
{
    public function updated(PasswordChangedNotificationContract $model){
        $model->sendPasswordChangedNotification($model->new_password,$model->old_password);
    }
}
