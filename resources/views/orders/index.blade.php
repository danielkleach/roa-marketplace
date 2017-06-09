<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div>
    @foreach ($orders as $order)
        <div>
            <h2>{{ $order->item->name }}</h2>
            <p>{{ $order->type }}</p>
            <p>{{ $order->quantity }}</p>
            <p>{{ $order->price }}</p>
        </div>
    @endforeach
</div>
</body>
</html>
