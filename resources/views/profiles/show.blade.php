@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 info-block">
            <h3>{{ $profile->character_name }}</h3>
            <p>{{ $profile->race }}</p>
        </div>
<<<<<<< HEAD
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-white">Sell Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        @if (count($sellOrders))
                            @foreach ($sellOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a></td>
                                    <td>{{ $order->location->name }}</td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td class="text-right">{{ $order->start_date }}</td>
                                    @if (Auth::user() && (Auth::user()->id == $order->user_id))
                                        <td class="text-center"><button type="button" class="btn btn-danger" data-id="{{ $order->id }}" onclick="closeOrder(this)">Close Order</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
=======
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="latest">Sell Orders</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="table-head">
                        <th>Item</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Price Each</th>
                        <th>Order Placed</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    @if (count($sellOrders))
                        @foreach ($sellOrders as $order)
>>>>>>> 1294684b88d36910162a201e1657b4ffd3ab18bb
                            <tr>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a>
                                </td>
                                <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                                <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                                <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                                <td><span class="mobile-description">Order Placed:</span>{{ $order->start_date }}</td>
                                <td class="text-center">
                                    @if (Auth::user() && (Auth::user()->id == $order->user_id))
                                        <button type="button" class="btn btn-danger" data-id="{{ $order->id }}" onclick="closeOrder(this)">Close Order</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center no-results" colspan="6">This user has no active sell orders.</td>
                        </tr>
                    @endif
                </table>
            </div>
<<<<<<< HEAD
            <div class="col-md-12">
                <h4 class="text-white">Buy Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        @if (count($buyOrders))
                            @foreach ($buyOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a></td>
                                    <td>{{ $order->location->name }}</td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td class="text-right">{{ $order->start_date }}</td>
                                    @if (Auth::user() && (Auth::user()->id == $order->user_id))
                                        <td class="text-center"><button type="button" class="btn btn-danger" data-id="{{ $order->id }}" onclick="closeOrder(this)">Close Order</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
=======
        </div>
        <div class="col-md-12">
            <h4 class="latest">Buy Orders</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="table-head">
                        <th>Item</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Price Each</th>
                        <th>Order Placed</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    @if (count($buyOrders))
                        @foreach ($buyOrders as $order)
>>>>>>> 1294684b88d36910162a201e1657b4ffd3ab18bb
                            <tr>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a>
                                </td>
                                <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                                <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                                <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                                <td><span class="mobile-description">Order Placed:</span>{{ $order->start_date }}</td>
                                <td class="text-center">
                                    @if (Auth::user() && (Auth::user()->id == $order->user_id))
                                        <button type="button" class="btn btn-danger" data-id="{{ $order->id }}" onclick="closeOrder(this)">Close Order</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center no-results" colspan="6">This user has no active buy orders.</td>
                        </tr>
                    @endif
                </table>
            </div>
<<<<<<< HEAD
            <div class="col-md-12">
                <h4 class="text-white">Expired Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Expired</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        @if (count($expiredOrders))
                            @foreach ($expiredOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a></td>
                                    <td>{{ $order->type }}</td>
                                    <td>{{ $order->location->name }}</td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td class="text-right">{{ $order->end_date }}</td>
                                    @if (Auth::user() && (Auth::user()->id == $order->user_id))
                                        <td class="text-center"><button type="button" class="btn btn-primary" data-id="{{ $order->id }}" onclick="refreshOrder(this)">Refresh Order</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
=======
        </div>
        <div class="col-md-12">
            <h4 class="latest">Expired Orders</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="table-head">
                        <th>Item</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Price Each</th>
                        <th>Order Expired</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    @if (count($expiredOrders))
                        @foreach ($expiredOrders as $order)
>>>>>>> 1294684b88d36910162a201e1657b4ffd3ab18bb
                            <tr>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}">{!! $order->item->name !!}</a>
                                </td>
                                <td><span class="mobile-description">Order Type:</span>{{ $order->type }}</td>
                                <td><span class="mobile-description">Location:</span>{{ $order->location->name }}</td>
                                <td><span class="mobile-description">Quantity:</span>{{ number_format($order->quantity) }}</td>
                                <td><span class="mobile-description">Price Each:</span>{{ number_format($order->price) }}G</td>
                                <td><span class="mobile-description">Order Closed:</span>{{ $order->end_date }}</td>
                                <td class="text-center">
                                    @if (Auth::user() && (Auth::user()->id == $order->user_id))
                                        <button type="button" class="btn btn-primary" data-id="{{ $order->id }}" onclick="refreshOrder(this)">Refresh Order</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center no-results" colspan="7">This user has no expired orders.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/moment.min.js"></script>
    <script>
        function closeOrder(order) {
            var id = order.dataset.id;
            var endDate = moment().format('YYYY-MM-DD HH:mm:ss');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                type: "PATCH",
                url: `/orders/${id}`,
                data: {
                    end_date: endDate
                },
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log('Error' + thrownError);
                }
            });
        }

        function refreshOrder(order) {
            var id = order.dataset.id;
            var endDate = moment().add(3, 'days').format('YYYY-MM-DD hh:mm:ss');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                type: "PATCH",
                url: `/orders/${id}`,
                data: {
                    end_date: endDate
                },
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log('Error' + thrownError);
                }
            });
        }
    </script>
@endsection
