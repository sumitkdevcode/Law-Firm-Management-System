<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PracticeArea extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'short_description',
        'description',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function cases()
    {
        return $this->hasMany(LegalCase::class, 'practice_area_id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
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
