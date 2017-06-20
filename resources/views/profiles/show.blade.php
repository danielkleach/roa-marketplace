@extends('layout.master')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-4 info-block">
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
                                    <td class="text-right">{{ $order->formattedDate }}</td>
                                    @if (Auth::user()->id == $order->user_id)
                                        <td class="text-center"><button type="button" class="btn btn-danger" data-id="{{ $order->id }}" onclick="closeOrder(this)">Close Order</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">This user has no active sell orders.</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Created</th>
                            <th class="text-center">Actions</th>
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
                                    <td class="text-right">{{ $order->formattedDate }}</td>
                                    @if (Auth::user()->id == $order->user_id)
                                        <td class="text-center"><button type="button" class="btn btn-danger" data-id="{{ $order->id }}" onclick="closeOrder(this)">Close Order</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">This user has no active buy orders.</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Item</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </table>
                </div>
            </div>
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
                                    <td class="text-right">{{ $order->expiredDate }}</td>
                                    @if (Auth::user()->id == $order->user_id)
                                        <td class="text-center"><button type="button" class="btn btn-primary" data-id="{{ $order->id }}" onclick="refreshOrder(this)">Refresh Order</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="7">This user has no expired orders.</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Item</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price Each</th>
                            <th class="text-right">Expired</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
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
