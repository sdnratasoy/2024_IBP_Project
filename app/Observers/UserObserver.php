<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Role;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //yeni eklenen userlara customer rolünü ata ama admin kullanıcısı için atama işlemi yapma
        if ($user->email !== 'admin@gmail.com') {
            $customerRole = Role::where('name', 'customer')->first();
            $user->roles()->attach($customerRole);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $user->roles()->detach();
        $user->delete();
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
