<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TagTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'tag_id',
        'user_id'
    ];

    public function task(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
