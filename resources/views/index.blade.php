@extends('layout.master')

@section('content')
    <div>
        <h4 class="latest">Latest Sell Orders</h4>
        <table class="table">
            <tr class="table-head">
                <th>Item</th>
                <th>User</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Created</th>
            </tr>
            @foreach ($latestSellOrders as $order)
                <tr>
                    <td>
                        <a href="{{ route('items.show', $order->item->id) }}">{!! $order->item->name !!}</a>
                    </td>
                    <td>
                        <span class="mobile-description">Character:</span>
                        <a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a>
                    </td>
                    <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                    <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                    <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                    <td><span class="mobile-description">Order Placed:</span>{{ $order->start_date }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <h4 class="latest">Latest Buy Orders</h4>
        <table class="table">
            <tr class="table-head">
                <th>Item</th>
                <th>User</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Created</th>
            </tr>
            @foreach ($latestBuyOrders as $order)
                <tr>
                    <td>
                        <a href="{{ route('items.show', $order->item->id) }}">{!! $order->item->name !!}</a>
                    </td>
                    <td>
                        <span class="mobile-description">Character:</span>
                        <a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a>
                    </td>
                    <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                    <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                    <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                    <td><span class="mobile-description">Order Placed:</span>{{ $order->start_date }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection