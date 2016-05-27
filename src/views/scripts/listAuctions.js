Vue.config.debug = true;

new Vue({
    el: '#list-auctions',

    data: {
        subcategories: [],
        auctions: [],
        filters: {
            category: '',
            subcategory: '',
            price: '',
            time: ''
        },
        loading: true
    },

    methods: {
        categorySelected: function(category) {
            var self = this;
            var $tab = $('a[href="#subcategoryTab"]');

            this.filters.category = category;

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchSubcategories',
                data : {category: category},

                beforeSend: function() {
                },

                success : function(data) {
                    self.subcategories = data;
                    $tab.parent().removeClass('disabled');
                    $tab.trigger('click');
                }
            });

            this.fetchFilteredAuctions({'categoria.nombre': category});
        },

        subcategorySelected: function(subcategory) {
            var $list = $('.list-auctions');

            this.filters.subcategory = subcategory;
            this.fetchFilteredAuctions({'subcategoria.nombre': subcategory});
        },

        fetchFilteredAuctions: function(filters) {
            var self = this;

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchFilteredAuctions',
                data : {
                    filters: filters
                },

                beforeSend: function() {
                    self.loading = true;
                },

                success: function(data) {
                    self.auctions = data;
                    setTimeout(function() { self.loading = false; }, 250);
                }
            });
        }
    }
});
