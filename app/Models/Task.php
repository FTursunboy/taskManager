<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'date',
        'description',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, QueryFilter $filters) : \Illuminate\Database\Eloquent\Builder
    {
        return $filters->apply($query);
    }

}
