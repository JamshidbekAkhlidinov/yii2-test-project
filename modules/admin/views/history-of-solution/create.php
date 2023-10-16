<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryOfSolution $model */

$this->title = Yii::t('app', 'Create History Of Solution');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Of Solutions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-of-solution-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
