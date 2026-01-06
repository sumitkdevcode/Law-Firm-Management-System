<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LegalCase extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'title',
        'slug',
        'practice_area_id',
        'client_name',
        'short_description',
        'description',
        'featured_image',
        'gallery',
        'result',
        'case_date',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'gallery' => 'array',
        'case_date' => 'date',
        'is_featured' => 'boolean',
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

    public function practiceArea()
    {
        return $this->belongsTo(PracticeArea::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
