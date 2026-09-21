<?php

use App\Models\Admin;
use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('authenticated admin can view team member edit form', function () {
    $admin = Admin::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role' => 'ADMIN',
    ]);

    $member = TeamMember::create([
        'name' => 'John Doe',
        'role' => 'President',
        'display_order' => 1,
        'is_active' => true,
    ]);

    $response = $this->actingAs($admin, 'admin')
        ->get(route('admin.team.edit', ['team' => $member]));

    $response->assertStatus(200);
    $response->assertSee('Edit Member');
    $response->assertSee('John Doe');
});

test('authenticated admin can update team member', function () {
    $admin = Admin::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role' => 'ADMIN',
    ]);

    $member = TeamMember::create([
        'name' => 'John Doe',
        'role' => 'President',
        'display_order' => 1,
        'is_active' => true,
    ]);

    $response = $this->actingAs($admin, 'admin')
        ->put(route('admin.team.update', ['team' => $member]), [
            'name' => 'Jane Doe',
            'role' => 'Vice President',
            'section' => 'founders',
            'linkedin_url' => 'https://linkedin.com/in/janedoe',
            'instagram_url' => 'https://instagram.com/janedoe',
            'display_order' => 2,
            'is_active' => 1,
        ]);

    $response->assertRedirect(route('admin.team.index'));
    $this->assertDatabaseHas('team_members', [
        'id' => $member->id,
        'name' => 'Jane Doe',
        'role' => 'Vice President',
        'section' => 'founders',
        'linkedin_url' => 'https://linkedin.com/in/janedoe',
        'instagram_url' => 'https://instagram.com/janedoe',
    ]);
});
