@extends('layout.master')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center text-white">Latest Sell Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                        @foreach ($latestSellOrders as $order)
                            <tr>
                                <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                <td><a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                                <td class="text-right">{{ number_format($order->quantity) }}</td>
                                <td class="text-right">{{ number_format($order->price) }}G</td>
                                <td>{{ $order->formattedDate }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Item</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-center text-white">Latest Buy Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                        @foreach ($latestBuyOrders as $order)
                            <tr>
                                <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                <td><a href="{{ route('users.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                                <td class="text-right">{{ number_format($order->quantity) }}</td>
                                <td class="text-right">{{ number_format($order->price) }}G</td>
                                <td>{{ $order->formattedDate }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Item</th>
                            <th>User</th>
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