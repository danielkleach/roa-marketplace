<div id="search-results" class="animated fadeInDown collapse">
    <div id="order-hits"></div>
    {{--<div id="order-pagination"></div>--}}
    <div id="order-stats"></div>
    <script type="text/html" id="order-hit-template">
        <div class="hit">
            <div class="hit-content">
                <div class="row">
                    <div class="col-xs-3"><a href="/orders/@{{id}}">@{{item.name}}</a></div>
                    <div class="col-xs-3">@{{quantity}}</div>
                    <div class="col-xs-3">@{{price}}G</div>
                    <div class="col-xs-3">@{{user.profile.character_name}}</div>
                </div>
            </div>
        </div>
    </script>
    <script type="text/html" id="order-no-results-template">
        <div id="order-no-results-message">
            <p>We didn't find any results for the search <em>"@{{query}}"</em>.</p>
        </div>
    </script>
</div>