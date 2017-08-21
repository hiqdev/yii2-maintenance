<style>
    .clock {
        width: 460px;
        margin: 7em auto;
        height: 116px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h1>Мы скоро вернемся</h1>
                <p class="lead">Извините, на сайте ведутся технические работы.</p>
            </div>

            <div class="curently"></div>

            <div class="text-center">
                <h1>We will come back soon</h1>
                <p class="lead">Sorry, currently we are working on this site</p>
            </div>

            <?php if ($minutes > 0) : ?>
                <?php $this->registerJs("var clock; $(document).ready(function () { clock = $('.clock').FlipClock({$minutes}, { countdown: true, autoStart: true }); $('.start').click(function (e) { clock.start(); }); }); "); ?>
                <div class="clock"></div>
            <?php endif; ?>
        </div>
    </div>
</div>

