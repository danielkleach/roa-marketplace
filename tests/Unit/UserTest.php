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
        $user = factory(User::class)->create([
            'email' => 'test@test.com',
            'password' => 'Test123'
        ]);

        $user->update([
            'password' => 'Test456'
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email,
            'password' => 'Test456'
        ]);
    }
}
