<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\forms\SelectedTestForm $model */

$this->title = Yii::t('app', 'Update Selected Test: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selected Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->name, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="selected-test-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
