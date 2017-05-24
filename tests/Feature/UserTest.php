<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_view_all_Users()
    {
        $users = factory(User::class, 5)->create();

        $response = $this->get('/users');

        $response->assertStatus(200);

        foreach ($users as $user) {
            $response->assertSee($user->email);
        }
    }

    public function test_user_can_view_a_user()
    {
        $user = factory(User::class)->create([
            'email' => 'test@test.com',
        ]);

        $response = $this->get('/users/'.$user->id);

        $response->assertStatus(200);
        $response->assertSee('test@test.com');
    }
}
