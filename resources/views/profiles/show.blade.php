@extends('layout.master')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-6 info-block">
                <h3 class="text-white">{{ $profile->character_name }}</h3>
                <p class="text-white">{{ $profile->race }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-white">Sell Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                        @if (count($sellOrders))
                            @foreach ($sellOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                    <td>{{ $order->location->name }}</td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td>{{ $order->formattedDate }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">This user has no active sell orders.</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <h4 class="text-white">Buy Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                        @if (count($buyOrders))
                            @foreach ($buyOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                    <td>{{ $order->location->name }}</td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td>{{ $order->formattedDate }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">This user has no active buy orders.</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection