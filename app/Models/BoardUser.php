<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $board_id
 * @property int $user_id
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Board $board
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BoardUser whereUserId($value)
 * @mixin \Eloquent
 */
class BoardUser extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
