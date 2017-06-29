var client = algoliasearch("QBCO0MN350", algoliaKey);
var index = client.initIndex('items_' + environment);

autocomplete('#aa-search-input',
    { hint: false }, {
        source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
        displayKey: 'name',
        templates: {
            suggestion: function(suggestion) {
                return '<span><a href="/items/' + suggestion.id + '">' +
                    suggestion._highlightResult.name.value + '</a></span>'
            }
        }
    });