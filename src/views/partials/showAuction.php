<div class="auction-page">
    <div class="row">
        <div class="col s12 m9">
            <div class="card-panel product">
                <div class="row">
                    <div class="col s12 m6">
                        <img src="<?php echo $auction['foto'] ?>" alt="" class="responsive-img materialboxed"> <!-- notice the "circle" class -->
                    </div>

                    <div class="col s12 m6 information">
                        <p><label>Producto</label> <?php echo $auction['nombre'] ?></p>
                        <span><label>Fabricante</label> <?php echo $auction['marca'] ?></span>&nbsp;&nbsp;&nbsp;
                        <span><label>Estado</label> Nuevo</span>
                        <p>
                            <label>Categoría</label>
                             <a href="/subastas/<?php echo $auction['categoria'] ?>"><?php echo $auction['categoria'] ?></a> <i class="fa fa-angle-right"></i>
                             <a href="/subastas/<?php echo $auction['categoria'] ?>/<?php echo $auction['subcategoria'] ?>"><?php echo $auction['subcategoria'] ?></a>
                        </p>
                        <p><label>Fin de la subasta</label> 22 Junio 2016 20:00</p>
                    </div>

                    <div class="col s12">
                        <p class="section-title">descripción</p>
                        <p><?php echo $auction['descripcion'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card-panel auction">
                <div class="time">
                    <label>Tiempo restante</label>

                    <p><i class="fa fa-calendar-o"></i> 2 Días</p>
                    <p><i class="fa fa-clock-o"></i><span id="remainingTime"> 15:20:00</span></p>
                </div>

                <p class="divider"></p>

                <div class="last-bid clear-fix">
                    <label>Última puja</label>
                    <span class="right"><span id="bidAmount"><?php echo $auction['pujaMin'] ?></span><sup>€</sup></span>
                </div>

                <p class="divider"></p>

                <div class="center-align">
                    <bid-button auction-id="<?php echo $auction['id'] ?>" product-name="<?php echo $auction['nombre'] ?>"></bid-button>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card-panel auctioneer">
                <div class="center-align">
                    <img src="http://beerhold.it/100/100/s" alt="" class="circle responsive-img">
                    <p>Nombre del subastador</p>

                    <p class="divider"></p>

                    <div class="rating">
                        <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </p>
                        <p>Votos positivos: 87,8%</p>
                    </div>

                    <p class="divider"></p>

                    <i class="fa fa-sign-in"></i><a href="#"> Más subastas</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        function updateTime() {
            var $time = $('#remainingTime');
            var today = new Date();
            var remaining = [
                ('0' + (24 - today.getHours())).slice(-2),
                ('0' + (59 - today.getMinutes())).slice(-2),
                ('0' + (59 - today.getSeconds())).slice(-2)
            ];

            $time.text(' ' + remaining.join(':'));

            setTimeout(function() { updateTime() }, 500);
        };
        updateTime();
    });
</script>
