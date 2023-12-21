<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">
            O'zingizni fanlardan tekshirib ko'ring!
        </h1>

        <p class="lead">
            Login qiling yoki ro'yxatdan o'ting, Testlarni boshlang va o'z bilim darajadgiz haqida bilib oling.
        </p>

        <?php if (!user()->isGuest): ?>
            <div class="pt-3">
                <?= Html::a("Fanlardan testlar", ['exam/subject'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a("Tanlanma testlar", ['exam/selected-test'], ['class' => 'btn btn-primary']) ?>
            </div>
        <?php else: ?>
            <?= Html::a("Kirish", ['site/login'], ['class' => 'btn btn-success']) ?>
            <?= Html::a("Ro'yxatdan o'tish", ['site/signup'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </div>

    <div class="body-content">

    </div>
</div>
