<?php

use app\modules\admin\repository\ModelsToArray;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Question $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'subject_id')->dropDownList(
                ModelsToArray::getSubject(),
                [
                    'prompt' => Yii::t('app', '--Select Subject--'),
                ]
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'test_id')->dropDownList(
                ModelsToArray::getSubject(),
                [
                    'prompt' => Yii::t('app', '--Select Test--'),
                ]
            ) ?>
        </div>
        <div class="col-md-6">

        </div>


    </div>


    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'bal')->input('number') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
