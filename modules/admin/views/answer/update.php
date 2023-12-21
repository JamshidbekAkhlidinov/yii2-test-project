<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Answer $model */

$this->title = Yii::t('app', 'Update Answer: {name}', [
    'name' => strip_tags($model->text),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="answer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
