<div class="list-auctions-page">
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