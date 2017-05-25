<?php

namespace App\Http\Controllers;

use App\Order;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestSellOrders = Order::with('item', 'user.profile')->where('type', 'sell')->orderBy('created_at', 'desc')->limit(10)->get();
        $latestBuyOrders = Order::with('item', 'user.profile')->where('type', 'buy')->orderBy('created_at', 'desc')->limit(10)->get();

        return view('index', compact('latestSellOrders', 'latestBuyOrders'));
    }
}
