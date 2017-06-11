<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\ItemRequest;
use App\Order;

class ItemController extends Controller
{
    protected $item, $order;

    public function __construct(Item $item, Order $order)
    {
        $this->item = $item;
        $this->order = $order;
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
            'description' => $request->description,
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

        $sellOrders = $this->order
            ->with('item', 'user.profile', 'location')
            ->where('type', 'sell')
            ->where('item_id', $item->id)
            ->orderBy('price', 'asc')
            ->limit(10)
            ->get();

        $buyOrders = $this->order
            ->with('item', 'user.profile', 'location')
            ->where('type', 'buy')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('items.show', compact('item', 'sellOrders', 'buyOrders'));
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

        $item->update($request->all());

        return $item;
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
