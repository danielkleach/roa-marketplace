    </div>
    <footer>
        <p class="disclaimer">This site is fan-made and not officially affiliated with Big Picture Games.</p>
        <p class="copyright">&copy; Copyright 2017 <em>(v.1)</em></p>
    </footer>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
    <script>
        var algoliaKey = '{{ config('app.algolia_key') }}';
        var environment = '{{ config('app.env') }}';
    </script>
    <script src="/js/search.js"></script>
    @yield('scripts')
</body>
</html>