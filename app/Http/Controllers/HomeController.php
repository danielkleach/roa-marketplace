<?php

namespace App\Http\Controllers;

use App\Order;

class HomeController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Display the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestSellOrders = $this->order
            ->with('item', 'user.profile', 'location')
            ->where('type', 'sell')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $latestBuyOrders = $this->order
            ->with('item', 'user.profile', 'location')
            ->where('type', 'buy')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('index', compact('latestSellOrders', 'latestBuyOrders'));
    }
}
