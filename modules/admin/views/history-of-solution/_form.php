<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HistoryOfSolution $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="history-of-solution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <?= $form->field($model, 'test_id')->textInput() ?>

    <?= $form->field($model, 'selected_test_id')->textInput() ?>

    <?= $form->field($model, 'ball')->textInput() ?>

    <?= $form->field($model, 'correct_answers_count')->textInput() ?>

    <?= $form->field($model, 'answers')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
