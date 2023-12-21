<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SelectedTest $model */

$this->title = Yii::t('app', 'Create Selected Test');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selected Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selected-test-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
