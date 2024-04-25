<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('project_team_id', function (Builder $builder) {
            $builder->whereRelation('project', 'team_id', auth()->user()->current_team_id);
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
