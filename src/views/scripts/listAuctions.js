Vue.config.debug = true;

new Vue({
    el: '#list-auctions',

    data: {
        subcategories: [],
        auctions: [],
        price: '',
        tempo: '',
        filters: {
            'categoria.nombre': '%',
            'subcategoria.nombre': '%',
            'subasta.caducidad': moment().add(6, 'months').format('Y-MM-D')
        },
        emptyResponse: false,
        loading: true
    },

    methods: {
        categorySelected: function(category) {
            var self = this;
            var $tab = $('a[href="#subcategoryTab"]');

            this.filters['categoria.nombre'] = category;
            this.changeSelectedButtonStyle(event.target, '#categoryTab');

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

            this.fetchFilteredAuctions();
        },

        subcategorySelected: function(subcategory) {
            this.filters['subcategoria.nombre'] = subcategory;
            this.changeSelectedButtonStyle(event.target, '#subcategoryTab');

            this.fetchFilteredAuctions();
        },

        priceSelected: function() {
            this.filters['subasta.pujaMin'] = this.price;
            this.fetchFilteredAuctions();
        },

        timeSelected: function(time) {
            var date = moment();

            if (time === 'today') {
                time = date.add(1, 'days').format('Y-MM-D');
            } else if (time === 'tomorrow') {
                time = date.add(2, 'days').format('Y-MM-D');
            } else if (time === 'week') {
                time = date.add(8, 'days').format('Y-MM-D');
            }

            this.filters['subasta.caducidad'] = time;
            this.changeSelectedButtonStyle(event.target, '#timeTab');

            this.fetchFilteredAuctions();
        },

        fetchFilteredAuctions: function(filters) {
            var self = this;

            $.ajax({
                type: 'POST',
                url: '/ajax/fetchFilteredAuctions',
                data : {
                    filters: self.filters
                },

                beforeSend: function() {
                    self.loading = true;
                },

                success: function(data) {
                    self.auctions = data;
                    self.emptyResponse = data.length == 0;

                    setTimeout(function() { self.loading = false; }, 250);
                }
            });
        },

        changeSelectedButtonStyle: function(target, buttonsContainer) {
            $(buttonsContainer + ' button').removeClass('active');
            $(target).addClass('active');
        }
    }
});
