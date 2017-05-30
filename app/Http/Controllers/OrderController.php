<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Location;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    protected $order;
    protected $item;
    protected $location;

    public function __construct(Order $order, Item $item, Location $location)
    {
        $this->order = $order;
        $this->item = $item;
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order->whereHas('item')->get();

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = $this->item->pluck('name', 'id');
        $locations = $this->location->pluck('name', 'id');

        return view('orders.create', compact('items', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @param $userId
     * @param $itemId
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, $userId, $itemId)
    {
        return $this->order->create([
            'user_id' => $userId,
            'item_id' => $itemId,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'price' => $request->price
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
        $order = $this->order->whereHas('item')->findOrFail($id);

        $sellOrders = $this->order
            ->whereHas('item')
            ->where('type', 'Sell')
            ->where('user_id', $order->user_id)
            ->get();

        $buyOrders = $this->order
            ->whereHas('item')
            ->where('type', 'Buy')
            ->where('user_id', $order->user_id)
            ->get();

        return view('orders.show', compact('order', 'sellOrders', 'buyOrders'));
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
     * @param OrderRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = $this->order->findOrFail($id);

        return $order->update($request->all());
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
