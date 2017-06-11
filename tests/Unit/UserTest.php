<?php

namespace Tests\Unit;

use App\User;
use App\Profile;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_be_updated()
    {
        $user = factory(User::class)->create();

        $data = [
            'password' => 'Test4567',
        ];

        $response = $this->actingAs($user)
            ->patchJson("/users/{$user->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $data);
    }
}
