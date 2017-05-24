<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    /**
     * Create a new user profile.
     *
     * @param ProfileRequest $request
     * @param $userId
     * @return mixed
     */
    public function store(ProfileRequest $request, $userId)
    {
        return Profile::create([
            'user_id' => $userId,
            'character_name' => $request->character_name,
            'race' => $request->race
        ]);
    }

    /**
     * Update a user profile.
     *
     * @param ProfileRequest $request
     * @param $profileId
     * @return mixed
     */
    public function update(ProfileRequest $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);

        return $profile->update([
            'character_name' => $request->character_name,
            'race' => $request->race
        ]);
    }
}
