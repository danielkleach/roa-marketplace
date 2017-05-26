@extends('layout.master')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $profile->character_name }}</h3>
                <h4>{{ $profile->race }}</h4>
                <div class="input-group">
                    <input id="contact-link" type="text" value="/tell {{ $profile->character_name }}">
                    <span class="input-group-button">
                         <button class="btn btn-blood" type="button" data-clipboard-target="#contact-link">
                            <i class="glyphicon glyphicon-clipboard"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Sell Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                        @if (!empty($sellOrders))
                            @foreach ($sellOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                    <td><a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td>{{ $order->formattedDate }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>This user has no active sell orders.</td>
                            </tr>
                        @endif
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
                <h4 class="text-center">Buy Orders</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Created</th>
                        </tr>
                        @if (!empty($buyOrders))
                            @foreach ($buyOrders as $order)
                                <tr>
                                    <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->item->name }}</a></td>
                                    <td><a href="{{ route('profiles.show', $order->user->id) }}">{{ $order->user->profile->character_name }}</a></td>
                                    <td class="text-right">{{ number_format($order->quantity) }}</td>
                                    <td class="text-right">{{ number_format($order->price) }}G</td>
                                    <td>{{ $order->formattedDate }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>This user has no active buy orders.</td>
                            </tr>
                        @endif
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

@section('scripts')
    <script src="/js/clipboard.min.js"></script>
    <script src="/js/clipboard-action.js"></script>
    <script>
        new Clipboard('.link');
    </script>
@endsection