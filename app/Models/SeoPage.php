<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $fillable = [
        'page_name',
        'page_url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_card',
        'canonical_url',
        'custom_head_scripts',
        'no_index',
        'no_follow',
        'is_active'
    ];

    protected $casts = [
        'no_index' => 'boolean',
        'no_follow' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get SEO data for a specific URL path
     */
    public static function getForUrl(string $url): ?self
    {
        // Normalize URL
        $url = '/' . ltrim($url, '/');
        if ($url !== '/') {
            $url = rtrim($url, '/');
        }

        return self::where('page_url', $url)
            ->where('is_active', true)
            ->first();
    }

    /**
     * Get robots meta content
     */
    public function getRobotsAttribute(): string
    {
        $robots = [];

        if ($this->no_index) {
            $robots[] = 'noindex';
        } else {
            $robots[] = 'index';
        }

        if ($this->no_follow) {
            $robots[] = 'nofollow';
        } else {
            $robots[] = 'follow';
        }

        return implode(', ', $robots);
    }

    /**
     * Scope for active pages
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the effective OG title
     */
    public function getEffectiveOgTitleAttribute(): string
    {
        return $this->og_title ?: $this->meta_title ?: $this->page_name;
    }

    /**
     * Get the effective OG description
     */
    public function getEffectiveOgDescriptionAttribute(): string
    {
        return $this->og_description ?: $this->meta_description ?: '';
    }
}
