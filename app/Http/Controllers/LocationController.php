<?php

namespace App\Http\Controllers;

use App\Location;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    protected $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = $this->location->all();

        return view('locations.index', ['locations' => $locations]);
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
     * @param LocationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        return $this->location->create([
            'name' => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = $this->location->findOrFail($id);

        return view('locations.show', ['location' => $location]);
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
     * @param LocationRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        $location = $this->location->findOrFail($id);

        $location->update($request->all());

        return $location;
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
