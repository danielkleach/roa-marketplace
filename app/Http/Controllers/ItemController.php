<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->item->all();

        return view('items.index', ['items' => $items]);
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
     * @param ItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        return $this->item->create([
            'name' => $request->name,
            'image' => $request->image,
            'rarity' => $request->rarity
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
        $item = $this->item->findOrFail($id);

        return view('items.show', ['item' => $item]);
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
     * @param ItemRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = $this->item->findOrFail($id);

        return $item->update($request->all());
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
