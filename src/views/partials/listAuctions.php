<div id="list-auctions" class="list-auctions-page">
    <div class="row">
        <div class="col s12">
            <div class="filter-auctions">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#categoryTab">Categoría</a></li>
                    <li class="tab col s3 disabled"><a href="#subcategoryTab">Subcategoría</a></li>
                    <li class="tab col s3 hide-on-small-only"><a href="#priceTab">Precio</a></li>
                    <li class="tab col s3 hide-on-small-only"><a href="#timeTab">Tiempo</a></li>
                </ul>

                <div class="row">
                    <div id="categoryTab" class="col s12 tab-body">
                        <div class="flex-grid">
                            <?php foreach ($categories as $category): ?>
                                <button class="btn btn-filter" @click="categorySelected('<?php echo $category['nombre'] ?>')">
                                    <?php echo $category['nombre'] ?>
                                </button>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <div id="subcategoryTab" class="col s12 tab-body">
                        <div class="flex-grid">
                            <button class="btn btn-filter" v-for="subcategory in subcategories" @click="subcategorySelected(subcategory.nombre)">
                                {{ subcategory.nombre }}
                            </button>
                        </div>
                    </div>

                    <div id="priceTab" class="col s12 tab-body price">
                        <form action="#">
                            <p class="range-field">
                                <label>Precio máximo: {{ price }}€</label>
                                <input type="range" v-model="price" @click="priceSelected()" min="0" max="100" step="0.5" value="20.5" />
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

    <div class="row list-auctions">
        <div class="top-auctions" v-if="auctions.length == 0">
            <?php foreach ($topAuctions as $auction): ?>
                <div class="col s12 m4 l3">
                    <div class="auction">
                        <div class="header">
                            <p class="title"><a href="/subasta/<?php echo $auction['id'] ?>"><?php echo $auction['nombre'] ?></a></p>
                            <a href="/subasta/<?php echo $auction['id'] ?>"><img src="<?php echo $auction['foto'] ?>" alt="" class="responsive-img"></a>
                        </div>

                        <div class="body">
                            <p class="days-left"></p>
                            <auction-timer end-time="<?php echo $auction['caducidad'] ?>"></auction-timer>
                            <p class="lowest-bid"><?php echo $auction['pujaMin'] ?><sup>€</sup></p>
                            <bid-button auction-id="<?php echo $auction['id'] ?>" product-name="<?php echo $auction['nombre'] ?>"></bid-button>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div v-else>
            <div v-if="!loading" v-for="auction in auctions" class="col s12 m4 l3">
                <div class="auction">
                    <div class="header">
                        <p class="title"><a href="/subasta/{{ auction.id }}">{{ auction.nombre }}</a></p>
                        <a href="/subasta/{{ auction.id }}"><img :src="auction.foto" alt="" class="responsive-img"></a>
                    </div>

                    <div class="body">
                        <p class="days-left"></p>
                        <auction-timer :end-time="auction.caducidad"></auction-timer>
                        <p class="lowest-bid">{{ auction.pujaMin.replace('.', ',') }}<sup>€</sup></p>
                        <bid-button :auction-id="auction.id" :product-name="auction.nombre"></bid-button>
                    </div>
                </div>
            </div>

            <div class="center-align" v-if="loading">
                <i class="fa fa-refresh fa-spin fa-5x fa-fw"></i>
            </div>
        </div>
    </div>
</div>
