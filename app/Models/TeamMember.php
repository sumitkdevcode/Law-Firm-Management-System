<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'position',
        'image',
        'bio',
        'full_bio',
        'education',
        'experience',
        'specializations',
        'email',
        'phone',
        'linkedin',
        'twitter',
        'order',
        'is_active'
    ];

    protected $casts = [
        'education' => 'array',
        'experience' => 'array',
        'specializations' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
