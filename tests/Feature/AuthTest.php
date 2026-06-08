<?php

uses(Tests\TestCase::class);
uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

use App\Models\User;

it('redirects guests away from the dashboard', function () {
  $this->get('/dashboard')
    ->assertRedirect('/login');
});

it('registers a user and redirects to the dashboard', function () {
  $response = $this->post('/register', [
    'name' => 'Admin Baru',
    'email' => 'baru@example.com',
    'password' => 'password123',
    'password_confirmation' => 'password123',
  ]);

  $response->assertRedirect('/dashboard');
  $this->assertDatabaseHas('users', ['email' => 'baru@example.com']);
});

it('logs in an existing user', function () {
  User::factory()->create([
    'email' => 'login@example.com',
    'password' => 'password123',
  ]);

  $this->post('/login', [
    'email' => 'login@example.com',
    'password' => 'password123',
  ])->assertRedirect('/dashboard');

  $this->assertAuthenticated();
});
