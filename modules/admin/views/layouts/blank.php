<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
    <?php $this->beginBody() ?>

    <div class="login-box">
        <div class="login-logo">
            <a href="<?= Url::home() ?>admin"><b>UstaDev.uz</b></a>
        </div>

        <div class="login-box-body">

            <?= $content ?>

        </div>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
