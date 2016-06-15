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
