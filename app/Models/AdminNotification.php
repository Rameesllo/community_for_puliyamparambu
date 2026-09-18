<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminNotification extends Model
{
    use HasFactory;

    protected $table = 'admin_notifications';

    /** @var list<string> */
    protected $fillable = [
        'title',
        'message',
        'type',
        'member_id',
        'is_read',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /** The member this notification is optionally linked to. */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /** Scope: unread notifications only. */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /** Human-readable Tailwind badge classes per type. */
    public static function typeClasses(): array
    {
        return [
            'info' => 'bg-blue-100 text-blue-700',
            'success' => 'bg-emerald-100 text-emerald-700',
            'warning' => 'bg-amber-100 text-amber-700',
            'alert' => 'bg-red-100 text-red-600',
        ];
    }
}
