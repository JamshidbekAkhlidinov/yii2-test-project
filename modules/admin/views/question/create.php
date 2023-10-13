<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Question $model */

$this->title = Yii::t('app', 'Create Question');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
