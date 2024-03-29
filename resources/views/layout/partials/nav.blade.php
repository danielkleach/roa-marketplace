<nav class="wrapper">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="logo" href="{{ route('home.index') }}">ROA Marketplace</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav pull-left">
            <li><a href="{{ route('orders.create') }}">Buy/Sell</a></li>
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                    {{--Services <span class="caret"></span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu -nav" role="menu">--}}
                    {{--<li>--}}
                        {{--<a href="#">Siege Help</a>--}}
                        {{--<a href="#">Item Gathering</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
        <ul class="nav pull-right">
            @if (Auth::guest())
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->profile->character_name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu -nav dropdown-menu-right" role="menu">
                        <li>
                            <a href="{{ route('profiles.show', Auth::user()->profile->id) }}">Profile</a>
                        </li>
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
</nav>