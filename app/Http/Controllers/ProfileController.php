<?php

namespace App\Http\Controllers;

use App\Order;
use App\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    protected $profile;
    protected $order;

    public function __construct(Profile $profile, Order $order)
    {
        $this->profile = $profile;
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->profile->all();

        return view('profiles.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $profile = $this->profile->create([
            'user_id' => $request->user_id,
            'character_name' => $request->character_name,
            'race' => $request->race
        ]);

        return $profile;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = $this->profile->with('user')->findOrFail($id);

        $sellOrders = $this->order->with('item')
            ->open()
            ->where('type', 'sell')
            ->where('user_id', $profile->user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $buyOrders = $this->order->with('item')
            ->open()
            ->where('type', 'buy')
            ->where('user_id', $profile->user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $expiredOrders = $this->order->with('item')
            ->closed()
            ->where('user_id', $profile->user->id)
            ->orderBy('start_date', 'desc')
            ->get();

        return view('profiles.show', compact('profile', 'sellOrders', 'buyOrders', 'expiredOrders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $profile = $this->profile->findOrFail($id);

        $profile->update($request->all());

        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
