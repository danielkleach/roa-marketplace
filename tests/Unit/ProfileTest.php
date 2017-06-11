<?php

namespace Tests\Unit;

use App\User;
use App\Profile;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_create_a_profile()
    {
        $user = factory(User::class)->create();

        $data = [
            'user_id' => $user->id,
            'character_name' => 'Red Queen',
            'race' => 'Elf'
        ];

        $response = $this->actingAs($user)
            ->postJson("/profiles", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('profiles', $data);
    }

    public function test_user_can_update_their_profile()
    {
        $user = factory(User::class)->create();

        $profile = factory(Profile::class)->create([
            'user_id' => $user->id,
            'character_name' => 'Red Queen',
            'race' => 'Elf'
        ]);

        $data = [
            'character_name' => 'Blue Queen',
            'race' => 'Human'
        ];

        $response = $this->actingAs($user)
            ->patchJson("/profiles/{$profile->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('profiles', $data);
    }
}
