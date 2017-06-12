@extends('layout.master')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-white">Latest Sell Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Order</th>
                            <th>Item</th>
                            <th>User</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Created</th>
                        </tr>
                        @foreach ($latestSellOrders as $order)
                            <tr>
                                <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></td>
                                <td><a href="{{ route('items.show', $order->item->id) }}">{{ $order->item->name }}</a></td>
                                <td><a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                                <td>{{ $order->location->name }}</td>
                                <td class="text-right">{{ number_format($order->quantity) }}</td>
                                <td class="text-right">{{ number_format($order->price) }}G</td>
                                <td class="text-right">{{ $order->formattedDate }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <h4 class="text-white">Latest Buy Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Order</th>
                            <th>Item</th>
                            <th>User</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Created</th>
                        </tr>
                        @foreach ($latestBuyOrders as $order)
                            <tr>
                                <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></td>
                                <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                <td><a href="{{ route('users.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                                <td>{{ $order->location->name }}</td>
                                <td class="text-right">{{ number_format($order->quantity) }}</td>
                                <td class="text-right">{{ number_format($order->price) }}G</td>
                                <td class="text-right">{{ $order->formattedDate }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection