<?php

use app\models\Subject;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SelectedTest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="selected-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'items')->widget(
        MultipleInput::class,
        [
            'max' => 10,
            'min' => 1, // should be at least 2 rows
            'allowEmptyList' => false,
            'enableGuessTitle' => true,
            'addButtonPosition' => MultipleInput::POS_HEADER,
            'columns' => [
                [
                    'title' => Yii::t('app', 'Subject'),
                    'name' => 'subject_id',
                    'type' => 'dropDownList',
                    'items' => ArrayHelper::map(
                        Subject::find()->all(),
                        'id',
                        'name',
                    ),
                    'options' => [
                        'prompt' => 'Select Subject'
                    ]
                ],
                [
                    'title' => Yii::t('app', 'Count'),
                    'name' => 'count',
                    'type' => 'textInput',
                ],
            ]
        ]
    ) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
