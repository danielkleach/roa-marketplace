<?php

namespace Tests\Feature;

use App\User;
use App\Profile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_view_all_user_profiles()
    {
        $users = factory(User::class, 5)->create()->each(function ($user) {
            factory(Profile::class)->create([
                'user_id' => $user->id,
                'character_name' => 'Test Character' . $user->id,
                'race' => 'Human',
            ]);
        });

        $response = $this->get('/profiles');

        $response->assertStatus(200);

        foreach ($users as $user) {
            $response->assertSee('Test Character' . $user->id);
            $response->assertSee('Human');
        }
    }

    public function test_user_can_view_a_user_profile()
    {
        $user = factory(User::class)->create();

        $profile = factory(Profile::class)->create([
            'user_id' => $user->id,
            'character_name' => 'Test Character',
            'race' => 'Human',
        ]);

        $response = $this->get('/profiles/'.$profile->id);

        $response->assertStatus(200);
        $response->assertSee('Test Character');
        $response->assertSee('Human');
    }
}
