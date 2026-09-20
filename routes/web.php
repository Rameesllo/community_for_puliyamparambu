<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Puliyamparambu Youth Community
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements');
Route::get('/file/{file}', [FileController::class, 'show'])->name('file.show');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Phase 4: Events
    Route::resource('admin/events', AdminEventController::class)->names('admin.events')->except(['show']);

    // Phase 5: Team
    Route::resource('admin/team', AdminTeamController::class)->names('admin.team')->except(['show']);

    // Phase 6: Members
    Route::resource('admin/members', AdminMemberController::class)->names('admin.members')->except(['show']);
    Route::patch('admin/members/{member}/toggle-active', [AdminMemberController::class, 'toggleActive'])->name('admin.members.toggle-active');

    // Phase 7: Announcements
    Route::resource('admin/announcements', AdminAnnouncementController::class)->names('admin.announcements')->except(['show']);
    Route::patch('admin/announcements/{announcement}/toggle-publish', [AdminAnnouncementController::class, 'togglePublish'])->name('admin.announcements.toggle-publish');

    // Phase 8: Notifications
    Route::get('admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::get('admin/notifications/create', [NotificationController::class, 'create'])->name('admin.notifications.create');
    Route::post('admin/notifications', [NotificationController::class, 'store'])->name('admin.notifications.store');
    Route::patch('admin/notifications/{notification}/mark-read', [NotificationController::class, 'markAsRead'])->name('admin.notifications.mark-read');
    Route::patch('admin/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('admin.notifications.mark-all-read');
    Route::delete('admin/notifications/{notification}', [NotificationController::class, 'destroy'])->name('admin.notifications.destroy');

    // Phase 9: Admin accounts (ADMIN role only)
    Route::middleware('admin.role:ADMIN')->group(function () {
        Route::get('admin/accounts', [AdminAccountController::class, 'index'])->name('admin.accounts.index');
        Route::get('admin/accounts/{admin}/edit-role', [AdminAccountController::class, 'editRole'])->name('admin.accounts.edit-role');
        Route::patch('admin/accounts/{admin}/role', [AdminAccountController::class, 'updateRole'])->name('admin.accounts.update-role');
    });
});
