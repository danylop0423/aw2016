<div class="auction-page">
    <div class="row">
        <div class="col s12 m9">
            <div class="card-panel product">
                <div class="row">
                    <div class="col s12 m6">
                        <img src="/assets/images/smartw6.png" alt="" class="responsive-img materialboxed"> <!-- notice the "circle" class -->
                    </div>

                    <div class="col s12 m6 information">
                        <p><label>Producto</label> Apple Watch Sport 38mm</p>
                        <span><label>Fabricante</label> Apple</span>&nbsp;&nbsp;&nbsp;
                        <span><label>Estado</label> Nuevo</span>
                        <p><label>Categoría</label> Electrónica <i class="fa fa-angle-right"></i> Reloj Smartwatch</p>
                        <p><label>Fin de la subasta</label> 22 Junio 2016 20:00</p>
                    </div>

                    <div class="col s12">
                        <p class="section-title">descripción</p>
                        <p>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea consequuntur quia necessitatibus sapiente architecto exercitationem sint incidunt ipsum odit? Aut porro, praesentium nulla recusandae. Esse nobis veniam voluptate, deleniti obcaecati.</span>
                            <span>Minima, quam aut saepe possimus totam voluptatem quis deserunt magnam eum molestiae ut officia suscipit eveniet? Molestias omnis ut, fugit non facere recusandae, necessitatibus earum error natus, optio nulla illum.</span>
                            <span>Eligendi soluta ut dolor illum reiciendis tempore veritatis iusto vitae cumque. Assumenda iusto temporibus voluptatibus. Nemo esse sed molestias voluptatum inventore laborum voluptate odit adipisci necessitatibus sapiente tempora, quas illum.</span>
                            <span>Temporibus officiis porro quisquam vel veniam, quasi eligendi libero consectetur labore cumque doloribus autem deserunt, fuga accusantium tempore dignissimos, ullam ipsa, architecto reprehenderit ab odit sed impedit sequi alias. Optio!</span>
                            <span>Eos et doloribus in similique officia commodi, eum nisi officiis aliquid doloremque dolore, provident rerum facilis. Qui quibusdam fugiat, veritatis asperiores quaerat, tenetur harum magnam mollitia aperiam, sint assumenda sed.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card-panel bid">
                <div class="auction">
                    <label>Tiempo restante</label>

                    <p><i class="fa fa-calendar-o"></i> 2 Días</p>
                    <p><i class="fa fa-clock-o"></i><span id="remainingTime"> 15:20:00</span></p>
                </div>

                <p class="divider"></p>

                <div class="last-bid clear-fix">
                    <label>Última puja</label>
                    <span class="right"><span id="bidAmount">22,5</span><sup>€</sup></span>
                </div>

                <p class="divider"></p>

                <div class="center-align">
                    <button class="btn"><i class="fa fa-gavel left"></i> Pujar</button>
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

    <a class="btn-floating btn-large waves-effect waves-light right"><i class="fa fa-gavel"></i></a>
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
