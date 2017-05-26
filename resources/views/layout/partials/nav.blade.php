<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Sell</a></li>
                    <li><a href="#">Item Request</a></li>
                </ul>
            </div>
            @include('layout.partials.search')
            <div class="col-md-4 col-sm-12 pull-right">
                <ul class="nav navbar-nav navbar-right">
                    <li class="border-right"><a href="#">Sign Up</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>