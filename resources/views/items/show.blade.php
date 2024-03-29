@extends('layout.master')

@section('content')
    <div class="info-block">
        <h3>{!! $item->name !!}</h3>
        <p>{!! $item->description !!}</p>
        <p>Rarity: {!! $item->rarity !!} </p>
    </div>
    <h4 class="latest">Sell Orders</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="table-head">
                <th>Item</th>
                <th>Character</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Created</th>
            </tr>
            @if (count($sellOrders))
                @foreach ($sellOrders as $order)
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
                        <td><span class="mobile-description">Price Each:</span>{{ rtrim(rtrim(number_format($order->price, 2, ".", ","), '0'), '.') }}G</td>
                        <td><span class="mobile-description">Order Placed:</span>{{ $order->start_date }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center no-results" colspan="6">This item has no active sell orders.</td>
                </tr>
            @endif
        </table>
    </div>
    <h4 class="latest">Buy Orders</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="table-head">
                <th>Item</th>
                <th>Character</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Created</th>
            </tr>
            @if (count($buyOrders))
                @foreach ($buyOrders as $order)
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
                        <td><span class="mobile-description">Price Each:</span>{{ rtrim(rtrim(number_format($order->price, 2, ".", ","), '0'), '.') }}G</td>
                        <td><span class="mobile-description">Order Placed:</span>{{ $order->start_date }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center no-results" colspan="6">This item has no active buy orders.</td>
                </tr>
            @endif
        </table>
    </div>
@endsection