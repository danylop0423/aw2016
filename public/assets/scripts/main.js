var bidButtonComponent = Vue.extend({
     template: `
        <button class="btn btn-block" @click="openBidModal()">PUJAR</button>
    `,

    data: function () {
        return { bid: '' };
    },

    props: [ 'auctionId', 'productName' ],

    methods: {
        openBidModal: function() {
            var self = this;

            swal({
                title: '<i class="fa fa-gavel"></i> Pujar por ' + self.productName,
                input: 'text',
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (!value) {
                            reject('¡Debe introducir el importe de la puja!');
                        } else if (!value.match(/[1-9][0-9]*(\.[0-9]*[1-9])?|0\.[0-9]*[1-9]/)) {
                            reject('¡El importe de la puja debe ser un numero válido!');
                        } else {
                            resolve();
                        }
                    });
                },
                inputPlaceholder: 'Importe',
                showCancelButton: true,
                confirmButtonText: 'Pujar',
                confirmButtonColor: '#e53935',
                cancelButtonText: 'Cerrar',
                showLoaderOnConfirm: true,
                preConfirm: function(bid) {
                    self.bid = bid;

                    return new Promise(function(resolve, reject) {
                        setTimeout(function() {
                            $.ajax({
                                url: '/ajax/makeBid',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    auction: self.auctionId,
                                    bid: bid
                                },
                                success: function(data) {
                                    if (data.error) {
                                        reject(data.error);
                                    } else {
                                        resolve();
                                    }
                                },
                                error: function(qXHR, textStatus, errorThrown) {
                                    reject(errorThrown + ' [' +  textStatus + ']');
                                }
                            });
                        }, 400);
                    });
                },
                allowOutsideClick: false
            }).then(function(email) {
                swal({
                    type: 'success',
                    confirmButtonColor: '#e53935',
                    title: 'Puja registrada correctamente',
                    html: 'Producto: ' + self.productName + '<br>' + 'Importe puja: ' + self.bid + '€'
                });
            });
        }
    }
});

Vue.component('bid-button', bidButtonComponent)

new Vue({
  el: '.auction'
});


Vue.config.debug = true;

new Vue({
    el: '#list-auctions',

    data: {
        subcategories: [],
        auctions: [],
        price: '',
        filters: {
            'categoria.nombre': '%',
            'subcategoria.nombre': '%',
            'subasta.pujaMin': ''
        },
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

            this.fetchFilteredAuctions({'categoria.nombre': category});
        },

        subcategorySelected: function(subcategory) {
            this.filters['subcategoria.nombre'] = subcategory;
            this.changeSelectedButtonStyle(event.target, '#subcategoryTab');

            this.fetchFilteredAuctions({'subcategoria.nombre': subcategory});
        },

        priceSelected: function() {
            this.filters['subasta.pujaMin'] = this.price;
            this.fetchFilteredAuctions(this.filters);
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
        },

        changeSelectedButtonStyle: function(target, buttonsContainer) {
            $(buttonsContainer + ' button').removeClass('active');
            $(target).addClass('active');
        }
    }
});


$.fn.populateSelect = function(data, options) {
    var settings = $.extend({
        empty: $(this).data('empty') || $(this).find('option:first').text(),
        selected: $(this).val() || false,
        value: 'id',
        label: 'nombre'
    }, options);

    $(this).data('empty', settings.empty);

    var $options = (settings.empty !== '') ? '<option value="">' + settings.empty + '</option>' : '';

    $.each(data, function() {
        $options += '<option value="' + this[settings.value] + '"' + (settings.selected && settings.selected === this[settings.value] ? ' selected="selected"' : '') + '>';
        $options += this[settings.label];
        $options += '</option>';
    });

    return this.each(function() {
        $(this).html($options);
    });
};

$.fn.populateProductSelect = function(data, options) {
    var settings = $.extend({
        empty: $(this).data('empty') || $(this).find('option:first').text(),
        selected: $(this).val() || false,
        value: 'id',
        label: 'nombre',
        image: 'foto'
    }, options);

    $(this).data('empty', settings.empty);

    var $options = (settings.empty !== '') ? '<option value="">' + settings.empty + '</option>' : '';

    $.each(data, function() {
        $options += '<option value="' + this[settings.value] + '" class="circle" data-icon="' + this[settings.image] + '"' + (settings.selected && settings.selected === this[settings.value] ? ' selected="selected"' : '') + '>';
        $options += this[settings.label];
        $options += '</option>';
    });

    return this.each(function() {
        $(this).html($options);
    });
};

$(function () {
    $('input#search').focus(function() { $(this).parent().addClass('focused'); });
    $('input#search').blur(function() {
        if (!$(this).val()) {
            $(this).parent().removeClass('focused');
        }
    });
});