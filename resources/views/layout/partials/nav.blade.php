<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="{{ route('orders.create') }}">Buy/Sell</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            @include('layout.partials.search')
            <div class="col-md-4 col-sm-12 pull-right">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li class="border-right"><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->profile->character_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>