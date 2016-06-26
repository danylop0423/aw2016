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
                        <span><label>Estado</label> <?php echo $auction['estado'] ? 'Usado' : 'Nuevo' ?></span>
                        <p>
                            <label>Categoría</label>
                             <a href="/subastas/<?php echo $auction['categoria'] ?>"><?php echo $auction['categoria'] ?></a> <i class="fa fa-angle-right"></i>
                             <a href="/subastas/<?php echo $auction['categoria'] ?>/<?php echo $auction['subcategoria'] ?>"><?php echo $auction['subcategoria'] ?></a>
                        </p>
                        <p><label>Fin de la subasta</label> <?php echo $auction['caducidad'] ?></p>
                    </div>

                    <div class="col s12">
                        <p class="section-title">descripción</p>
                        <p><?php echo $auction['descripcion'] ?></p>
                    </div>
                </div>
            </div>

            <div class="card-panel reviews">
                <div class="row">
                    <div class="col s12">
                        <p class="section-title">comentarios sobre el subastador</p>

                        <?php foreach ($reviews as $review): ?>
                            <blockquote>
                                <p><?php echo $review['texto'] ?></p>
                                <footer><?php echo $review['origen'] ?></footer>
                            </blockquote>

                            <p class="divider"></p>
                        <?php endforeach ?>
                    </div>

                    <div class="col s12 right-align">
                        <button class="btn btn-flat modal-trigger" data-target="modal">añadir comentario</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card-panel auction">
                <div class="time">
                    <label>Tiempo restante</label>

                    <p>
                        <i class="fa fa-clock-o"></i>
                        <span id="remainingTime"> <auction-timer end-time="<?php echo $auction['caducidad'] ?>"></auction-timer></span>
                    </p>
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
                    <img src="<?php echo $auction['subastador_foto'] ?>" width="100" alt="" class="circle responsive-img">
                    <p><?php echo $auction['subastador_nombre'] . ' ' . $auction['subastador_apellido'] ?></p>

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

    <div id="modal" class="modal">
        <form action="/ajax/addReview" name="addReview" method="POST">
            <div class="modal-content">
                <h4>Comentario sobre el subastador</h4>
                <div class="input-field col s12">
                    <textarea id="textarea" name="review[texto]" class="materialize-textarea"></textarea>
                    <label for="textarea">Textarea</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">cancelar</a>
                <button type="submit" class="btn">enviar</button>
            </div>
            <input type="hidden" name="review[destino]" value="<?php echo $auction['subastador_id'] ?>">
        </form>
    </div>
</div>



<script>
    $(function () {
        $('.modal-trigger').leanModal();

        new Vue({
          el: '.auction'
        });

        $('form[name="addReview"]').on('submit', function(e) {
            $form = $(this);

            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $form.serialize(),

                success: function (data) {
                    if (typeof data.error !== 'undefined') {
                        Materialize.toast(data.error, 10000);
                    } else {
                        $('#modal').closeModal();
                        Materialize.toast('Comentario registrado correctamente', 10000);
                    }
                }
            });

            e.preventDefault();
        });
    });
</script>
