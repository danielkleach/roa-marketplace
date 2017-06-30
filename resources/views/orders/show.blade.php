@extends('layout.master')

@section('content')
    <div class="info-block">
        <h3>Order #{{ $order->id }} - {!! $order->item->name !!}</h3>
        <p>{{ $order->user->profile->character_name }}</p>
        <p>Location: {{ $order->location->name }} </p>
    </div>
    <h4 class="latest">Sell Orders By This User</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="table-head">
                <th>Item</th>
                <th>Location</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Created</th>
            </tr>
            @if (count($sellOrders))
                @foreach ($sellOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a>
                        </td>
                        <td><span class="mobile-description">Order Type:</span>{{ $order->type }}</td>
                        <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                        <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                        <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                        <td><span class="mobile-description">Order Closed:</span>{{ $order->end_date }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center no-results" colspan="6">This item has no active sell orders.</td>
                </tr>
            @endif
        </table>
    </div>
    <h4 class="latest">Buy Orders By This User</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="table-head">
                <th>Item</th>
                <th>Location</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Created</th>
            </tr>
            @if (count($buyOrders))
                @foreach ($buyOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a>
                        </td>
                        <td><span class="mobile-description">Order Type:</span>{{ $order->type }}</td>
                        <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                        <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                        <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                        <td><span class="mobile-description">Order Closed:</span>{{ $order->end_date }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center no-results" colspan="6">This user has no active buy orders.</td>
                </tr>
            @endif
        </table>
    </div>
@endsection