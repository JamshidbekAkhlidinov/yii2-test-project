<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */

/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Yuqoridagi xatolik veb-server sizning so'rovingizga ishlov berayotganda yuz berdi. </p>
    <p>
        Agar buni server xatosi deb hisoblasangiz, biz bilan bog‘laning. Rahmat.
    </p>

    <?=Html::a("Chiqish",['/admin/dashboard/logout'],['class'=>'btn btn-info'])?>
    <?=Html::a("Bosh sahifa",['/admin/dashboard'],['class'=>'btn btn-info'])?>

</div>
