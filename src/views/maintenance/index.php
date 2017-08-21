<?php


$this->registerJs("
var clock;
    $(document).ready(function () {
        clock = $('.clock').FlipClock({$minutes}, {
        countdown: true,
        autoStart: true
    });

    $('.start').click(function (e) {
        clock.start();
    });
});
");
?>
<div class="container">
    <div class="text-center">
        <h1>Мы скоро вернемся</h1>
        <p class="lead">Извините, на сайте ведутся технические работы.</p>
    </div>
</div>

<div class="curently"></div>

<div class="container">
    <div class="text-center">
        <h1>We will come back soon</h1>
        <p class="lead">Sorry, currently we are working on this site</p>
    </div>
</div>

<?php if ($minutes > 0) : ?>
    <div class="container">
        <div class="clock"></div>
    </div>
<?php endif; ?>

