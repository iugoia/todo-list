<?php

namespace App\Policies;

use App\Enums\BoardRoleEnum;
use App\Models\Board;
use App\Models\BoardUser;
use App\Models\Column;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ColumnPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Board $board): bool
    {
        return $board->users->contains($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Board $board, Column $column): bool
    {
        return $board->users->contains($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Board $board): bool
    {
        return $board->user_id === $user->id || BoardUser::where('user_id', $user->id)->where('role', BoardRoleEnum::ADMIN->value)->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Board $board, Column $column): bool
    {
        return $board->user_id === $user->id || BoardUser::where('user_id', $user->id)->where('role', BoardRoleEnum::ADMIN->value)->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Board $board, Column $column): bool
    {
        return $board->user_id === $user->id || BoardUser::where('user_id', $user->id)->where('role', BoardRoleEnum::ADMIN->value)->exists();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Board $board, Column $column): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Board $board, Column $column): bool
    {
        //
    }
}
