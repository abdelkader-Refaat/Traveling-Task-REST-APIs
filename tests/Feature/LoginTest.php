<?php

use App\Models\User;

test('test_log_in_user_with_valid_crediential_token', function () {
    $user = User::factory()->create();
    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertStatus(200);
    $response->asserJsonStructrue(['access_token']);
});

test('test_log_in_user_with_invalid_crediential_token', function () {
    $response = $this->postJson('/api/v1/login', [
        'email' => 'example@email.com',
        'password' => 'password',
    ]);

    $response->assertStatus(422);
});
