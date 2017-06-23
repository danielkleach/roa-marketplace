@extends('layout.master')

@section('content')
    <div>
        <h4>Latest Sell Orders</h4>
        <table class="table">
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
                    <td><a href="{{ route('items.show', $order->item->id) }}">{!! $order->item->name !!}</a></td>
                    <td><a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                    <td>{{ $order->location->name }}</td>
                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                    <td class="text-right">{{ number_format($order->price) }}G</td>
                    <td class="text-right">{{ $order->start_date }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <h4>Latest Buy Orders</h4>
        <table class="table">
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
                    <td><a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a></td>
                    <td><a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                    <td>{{ $order->location->name }}</td>
                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                    <td class="text-right">{{ number_format($order->price) }}G</td>
                    <td class="text-right">{{ $order->start_date }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection