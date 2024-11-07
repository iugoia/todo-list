<?php

namespace App\Observers;

use App\Enums\BoardRoleEnum;
use App\Models\Board;
use App\Models\BoardUser;

class BoardObserver
{
    /**
     * Handle the Board "created" event.
     */
    public function created(Board $board): void
    {
        BoardUser::create([
            'board_id' => $board->id,
            'user_id'  => user()->id,
            'role'     => BoardRoleEnum::ADMIN->value
        ]);
    }

    /**
     * Handle the Board "updated" event.
     */
    public function updated(Board $board): void
    {
        //
    }

    /**
     * Handle the Board "deleted" event.
     */
    public function deleted(Board $board): void
    {
        //
    }

    /**
     * Handle the Board "restored" event.
     */
    public function restored(Board $board): void
    {
        //
    }

    /**
     * Handle the Board "force deleted" event.
     */
    public function forceDeleted(Board $board): void
    {
        //
    }
}
