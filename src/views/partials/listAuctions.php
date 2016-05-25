<div class="list-auctions-page">
    <div class="row">
        <div class="col s12">
            <div class="filter-auctions">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#categoryTab">Categoría</a></li>
                    <li class="tab col s3 disabled"><a href="#subcategoryTab">Subcategoría</a></li>
                    <li class="tab col s3"><a href="#priceTab">Precio</a></li>
                    <li class="tab col s3"><a href="#timeTab">Tiempo</a></li>
                </ul>

                <div class="row">
                    <div id="categoryTab" class="col s12 tab-body">
                        <div class="flex-grid">
                            <?php for ($i=0; $i < 20; $i++): ?>
                                <button class="btn btn-filter">Categoría <?php echo $i ?></button>
                            <?php endfor ?>
                        </div>
                    </div>

                    <div id="subcategoryTab" class="col s12 tab-body">
                        <div class="flex-grid">
                            <?php for ($i=0; $i < 9; $i++): ?>
                                <button class="btn btn-filter">Subcategoría <?php echo $i ?></button>
                            <?php endfor ?>
                        </div>
                    </div>

                    <div id="priceTab" class="col s12 tab-body price">
                        <form action="#">
                            <p class="range-field">
                                <label>Precio máximo: 15,20€</label>
                                <input type="range" id="test5" min="0" max="100" step="0.5" value="15.20" />
                            </p>
                        </form>
                    </div>

                    <div id="timeTab" class="col s12 tab-body time">
                        <div class="filters">
                            <div>
                                <label>La subasta termina:</label>
                            </div>

                            <div class="flex-grid">
                                <button class="btn btn-filter">Hoy</button>
                                <button class="btn btn-filter">Mañana</button>
                                <button class="btn btn-filter">Esta semana</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php for ($i=0; $i < 5; $i++): ?>
            <div class="col s12 m4">
                <div class="card-panel auction center-align">
                    <div class="header">
                        <p class="title"><a href="/subasta/<?php echo $i ?>">Apple Watch Sport 38mm</a></p>
                        <a href="/subasta/<?php echo $i ?>"><img src="/assets/images/smartw6.png" alt="" class="responsive-img"></a>
                    </div>

                    <div class="body">
                        <p class="days-left"></p>
                        <p class="time-left remainingTime">02:22:01</p>
                        <p class="lowest-bid">13,25<sup>€</sup></p>
                        <button class="btn btn-block">Pujar</button>
                    </div>
                </div>
            </div>
        <?php endfor ?>
    </div>
</div>

<script>
    $(function () {
        function updateTime() {
            var $time = $('.remainingTime');
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