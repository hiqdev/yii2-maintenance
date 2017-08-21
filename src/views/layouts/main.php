<?php

use hiqdev\maintenance\Asset;
use yii\helpers\Html;

Asset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <title><?= Html::encode(Yii::$app->name); ?></title>
        <?php $this->head(); ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?= $content; ?>
    <script type="text/javascript">
    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>