var orders = instantsearch({
    appId: 'QBCO0MN350',
    apiKey: algoliaKey,
    indexName: 'orders_' + environment,
    urlSync: true,
    searchFunction: function(helper) {
        var searchResults = $('#search-results');
        var query = orders.helper.state.query;
        if (query === '') {
            searchResults.hide();
            return;
        }
        helper.search();
        searchResults.show();
    }
});

var orderHits = instantsearch.widgets.hits({
    container: '#order-hits',
    hitsPerPage: 10,
    templates: {
        item: getTemplate('order-hit'),
        empty: getTemplate('order-no-results')
    }
});
//var orderPagination = instantsearch.widgets.pagination({
//    container: '#order-pagination'
//});

var orderStats = instantsearch.widgets.stats({
    container: '#order-stats'
});

var searchBox = instantsearch.widgets.searchBox({
    container: '#search-input',
    placeholder: 'Search for something..'
});

orders.addWidget(orderHits);
//orders.addWidget(orderPagination);
orders.addWidget(orderStats);

orders.addWidget(searchBox);

orders.start();

function getTemplate(templateName) {
    return document.getElementById(templateName + '-template').innerHTML;
}