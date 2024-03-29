@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h3>Place an order</h3>
            <hr>
            <ul>
                @foreach($errors->all() as $error)
                    <li class="error-message">* {{ $error }}</li>
                @endforeach
            </ul>
            {!! Form::open(array('route' => 'orders.store', 'class' => 'form')) !!}
            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('Buying or Selling?') !!}
                    {!! Form::select('type', ['Buy' => 'Buying', 'Sell' => 'Selling'], null, ['class' => 'selectpicker', 'placeholder' => ' ']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('Location') !!}
                    {!! Form::select('location_id', $locations, null, ['class' => 'selectpicker']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('Item') !!}
                    {!! Form::select('item_id', $items, null, ['class' => 'selectpicker', 'data-live-search' => "true"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('Quantity') !!}
                    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-8">
                    <div class="input-group">
                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Amount']) !!}
                        <div class="input-group-addon">Gold Per Item</div>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <button class="btn btn-outline btn-blood pull-right form-control" type="submit">Create Order</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-12 col-md-6">
            <h3 class="heading">Notice:</h3>
            <hr>
            <p>Your orders will be active for 3 days, unless you close them early.  Once an order has reached the 3 day expiration, you will be able to reopen it through the "Expired Orders" section of your profile.</p>
            <p>The intention for this limitation is to limit stale or outdated orders and make for a more meaningful experience.</p>
            <p>Once your items have been bought or sold, please close your orders through the orders section of your profile. Thank you.</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.selectpicker').selectpicker();
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }
    </script>
@endsection