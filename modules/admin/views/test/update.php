<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Test $model */

$this->title = Yii::t('app', 'Update Test: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="test-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
