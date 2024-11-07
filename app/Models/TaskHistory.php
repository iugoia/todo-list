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
 * @property string $action
 * @property array $params
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Task $task
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskHistory whereUserId($value)
 * @mixin \Eloquent
 */
class TaskHistory extends Model
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

    protected function casts(): array
    {
        return [
            'params' => 'array'
        ];
    }
}
