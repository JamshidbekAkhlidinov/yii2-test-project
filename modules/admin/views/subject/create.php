<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subject $model */

$this->title = Yii::t('app', 'Create Subject');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
