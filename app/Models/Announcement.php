<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'is_published',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    /**
     * Scope for published announcements only.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderByDesc('published_at');
    }
}
