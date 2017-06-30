<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ROA Marketplace</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<header>
    @include('layout.partials.nav')
</header>
@include('layout.partials.search')
@if ( session('message') )
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <p>{{ session('message', '') }}</p>
    </div>
@elseif ( session('error') )
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <p>{{ session('error', '') }}</p>
    </div>
@endif
<main>