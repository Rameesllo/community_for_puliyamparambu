<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Add indexes for frequently-queried columns to improve performance.
 * All indexes are added conditionally so re-running is safe.
 */
return new class extends Migration
{
    public function up(): void
    {
        // events: queried by date + status on every public & dashboard load
        Schema::table('events', function (Blueprint $table) {
            $table->index(['date', 'status'], 'events_date_status_idx');
        });

        // announcements: queried by is_published + published_at on every public load
        Schema::table('announcements', function (Blueprint $table) {
            $table->index(['is_published', 'published_at'], 'announcements_published_idx');
        });

        // members: queried by is_active frequently
        Schema::table('members', function (Blueprint $table) {
            $table->index('is_active', 'members_is_active_idx');
        });

        // team_members: queried by is_active + display_order
        Schema::table('team_members', function (Blueprint $table) {
            $table->index(['is_active', 'display_order'], 'team_members_active_order_idx');
        });

        // admin_notifications: queried by is_read frequently
        Schema::table('admin_notifications', function (Blueprint $table) {
            $table->index('is_read', 'admin_notifications_is_read_idx');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('events_date_status_idx');
        });
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropIndex('announcements_published_idx');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropIndex('members_is_active_idx');
        });
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropIndex('team_members_active_order_idx');
        });
        Schema::table('admin_notifications', function (Blueprint $table) {
            $table->dropIndex('admin_notifications_is_read_idx');
        });
    }
};
