<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'practice_area_id',
        'message',
        'status',
        'admin_notes'
    ];

    public function practiceArea()
    {
        return $this->belongsTo(PracticeArea::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'new' => 'warning',
            'read' => 'info',
            'replied' => 'success',
            'closed' => 'secondary',
            default => 'primary',
        };
    }
}
