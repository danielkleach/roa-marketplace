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
        $latestSellOrders = $this->order->open()->latestSellOrders()->get();

        $latestBuyOrders = $this->order->open()->latestBuyOrders()->get();

        return view('index', compact('latestSellOrders', 'latestBuyOrders'));
    }
}
