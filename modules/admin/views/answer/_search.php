<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\AnswerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="answer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'test_id') ?>

    <?= $form->field($model, 'question_id') ?>

    <?= $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'correct_answer') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'crated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
