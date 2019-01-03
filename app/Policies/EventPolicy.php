<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\NewEvent;


class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, NewEvent $event)
    {
        return $user->id == $event->organizer_id;
    }
    public function join(User $user, NewEvent $event)
    {
        return $user->role == 'participant' && $event->published;
    }
}
