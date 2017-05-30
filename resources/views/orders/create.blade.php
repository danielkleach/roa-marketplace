@extends('layout.master')

@section('content')
    <main>
        <div class="row bg-white container-padding">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h4 class="heading">Place an order</h4>
                    <hr>
                </div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                {!! Form::open(array('route' => 'orders.store', 'class' => 'form')) !!}
                <div class="form-group col-md-6">
                    {!! Form::label('Buying or Selling?') !!}
                    {!! Form::select('type', ['Buy' => 'Buying', 'Sell' => 'Selling'], null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('Location') !!}
                    {!! Form::select('location_id', $locations, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('Item') !!}
                    {!! Form::select('item_id', $items, null, ['class' => 'selectpicker', 'data-live-search' => "true"]) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('Quantity') !!}
                    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-8">
                    <div class="input-group">
                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Amount']) !!}
                        <div class="input-group-addon">Gold Per Item</div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <button class="btn btn-outline btn-blood pull-right form-control" type="submit">Create Order</button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                <h4>Notice:</h4>
                <p>Once your items have been bought or sold, please close your orders through the orders section of your profile.</p>
                <p>Your orders will be active for 24 hours, unless you close them early.  Once an order has reached the 24 hour expiration, you will be able to reopen it through your profile.</p>
                <p>The intention for this limitation is to limit stale or outdated orders, and should keep the relevancy of the orders positive and make for a more meaningful experience.</p>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/bootstrap-select.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endsection