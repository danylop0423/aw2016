<div class="product-page">
    <div class="row">
        <div class="col s12 m9">
            <div class="card-panel product">
                <div class="row">
                    <div class="col s12 m6">
                        <img src="<?php echo $product['foto'] ?>" alt="" class="responsive-img materialboxed"> <!-- notice the "circle" class -->
                    </div>

                    <div class="col s12 m6 information">
                        <p><label>Producto</label> <?php echo $auction['nombre'] ?></p>
                        <span><label>Fabricante</label> <?php echo $auction['marca'] ?></span>&nbsp;&nbsp;&nbsp;
                        <span><label>Estado</label> Nuevo</span>
                        <p>
                            <label>Categoría</label>
                             <a href="/productos/<?php echo $product['categoria'] ?>"><?php echo $product['categoria'] ?></a> <i class="fa fa-angle-right"></i>
                             <a href="/productos/<?php echo $product['categoria'] ?>/<?php echo $product['subcategoria'] ?>"><?php echo $product['subcategoria'] ?></a>
                        </p>
                        <p><label>Fin de la subasta</label> 22 Junio 2016 20:00</p>
                    </div>

                    <div class="col s12">
                        <p class="section-title">descripción</p>
                        <p><?php echo $product['descripcion'] ?></p>
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
