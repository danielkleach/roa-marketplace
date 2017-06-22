</main>
<footer>
    <div class="container">
        <p class="disclaimer pull-left">This site is fan-made and not officially affiliated with Big Picture Games.</p>
        <p class="copyright pull-right">&copy; Copyright 2017</p>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<script>
    var algoliaKey = '{{ config('app.algolia_key') }}';
    var environment = '{{ config('app.env') }}';
</script>
<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>