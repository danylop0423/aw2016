var auctionTimerComponent = Vue.extend({
     template: `
        <p class="time-left">{{ remainingTime }}</p>
    `,

    ready: function() {
        this.endTime = new Date(this.endTime);
        this.endTime = {
            hour: this.endTime.getHours() == 0 ? 24 : this.endTime.getHours(),
            minutes: this.endTime.getMinutes() == 0 ? 59 : this.endTime.getMinutes() - 1,
            day: this.endTime.getDay(),
            month: this.endTime.getMonth(),
            date: this.endTime
        }
        this.updateTime();
    },

    data: function() {
        return { remainingTime: '' };
    },

    props: [ 'endTime' ],

    methods: {
        updateTime: function () {
            var self = this;
            var today = new Date();
            var seconds = Math.floor((this.endTime.date - today) / 1000);
            var remaining = [
                Math.floor(seconds / 3600),
                ('0' + (this.endTime.minutes - today.getMinutes())).slice(-2),
                ('0' + (59 - today.getSeconds())).slice(-2)
            ];

            this.remainingTime = remaining.join(':');

            setTimeout(function() { self.updateTime() }, 500);
        }
    }
});

Vue.component('auction-timer', auctionTimerComponent);

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

Vue.component('bid-button', bidButtonComponent);


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


$(function () {
    $('#nav-mobile').on('mouseover', function() {
        $(this).css('overflow', 'scroll');
    });

    $('#nav-mobile').on('mouseout', function() {
        $(this).css('overflow', 'auto');
    });
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