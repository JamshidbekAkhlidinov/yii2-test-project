<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subject $model */

$this->title = Yii::t('app', 'Update Subject: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
