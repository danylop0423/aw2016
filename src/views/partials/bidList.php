<div id="list-auctions" class="list-auctions-page">

    <div class="row list-auctions">
        <div class="top-auctions" v-if="auctions.length == 0">
            <?php foreach ($Bids as $auction): ?>
                <div class="col s12 m4 l4">
                    <div class="auction">
                        <div class="header">
                            <p class="title"><a href="/subasta/<?php echo $auction['id'] ?>"><?php echo $auction['nombre'] ?></a></p>
                            <a href="/subasta/<?php echo $auction['id'] ?>"><img src="<?php echo $auction['foto'] ?>" alt="" class="responsive-img"></a>
                        </div>

                        <div class="body">
                            <p class="days-left"></p>
							<auction-timer end-time="<?php echo $auction['caducidad'] ?>"></auction-timer>
                            <p class="lowest-bid"><span>Min: </span><?php echo $auction['pujaMin'] ?><sup>€</sup></p>
							<p class="lowest-bid"><span>Your Last: </span><?php echo $auction['valor'] ?><sup>€</sup></p>
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
                </div>
            </div>

            <div class="center-align" v-if="loading">
                <i class="fa fa-refresh fa-spin fa-5x fa-fw"></i>
            </div>
        </div>
    </div>

	</div>
