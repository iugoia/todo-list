<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Task $task
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskParticipant whereUserId($value)
 * @mixin \Eloquent
 */
class TaskParticipant extends Model
{
    protected $guarded = [];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
