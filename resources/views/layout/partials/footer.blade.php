</main>
<footer>
    <div class="wrapper">
        <p class="disclaimer">This site is fan-made and not officially affiliated with Big Picture Games.</p>
        <p class="copyright">&copy; Copyright 2017</p>
    </div>
</footer>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-101984962-1', 'auto');
    ga('send', 'pageview');

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/algoliasearch/3.24.0/algoliasearch.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/autocomplete.js/0.28.2/autocomplete.min.js"></script>
<script>
    var algoliaKey = '{{ config('app.algolia_key') }}';
    var environment = '{{ config('app.env') }}';
</script>
<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>