<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * View all profiles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::whereHas('profile')->get();

        return view('users.index', ['users' => $users]);
    }

    /**
     * View a single profile by id.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::whereHas('profile')->findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Update a user.
     *
     * @param UserRequest $request
     * @param $userId
     * @return mixed
     */
    public function update(UserRequest $request, $userId)
    {
        $profile = User::findOrFail($userId);

        return $profile->update([
            'password' => $request->password
        ]);
    }
}
