<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Answer $model */

$this->title = Yii::t('app', 'Create Answer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
