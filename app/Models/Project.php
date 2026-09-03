<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'tech_stack',
        'github_url',
        'live_url',
        'featured',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'featured' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order')->orderByDesc('created_at');
    }
}
