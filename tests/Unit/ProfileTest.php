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

        factory(Profile::class)->create([
            'user_id' => $user->id,
            'character_name' => 'Red Queen',
            'race' => 'Elf'
        ]);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'character_name' => 'Red Queen',
            'race' => 'Elf'
        ]);
    }

    public function test_user_can_update_their_profile()
    {
        $user = factory(User::class)->create();

        $profile = factory(Profile::class)->create([
            'user_id' => $user->id,
            'character_name' => 'Red Queen',
            'race' => 'Elf'
        ]);

        $profile->update([
            'character_name' => 'Blue Queen',
            'race' => 'Human'
        ]);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'character_name' => 'Blue Queen',
            'race' => 'Human'
        ]);
    }
}
