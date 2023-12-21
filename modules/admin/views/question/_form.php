<?php

use alexantr\tinymce\TinyMCE;
use app\models\Test;
use app\modules\admin\repository\ModelsToArray;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\forms\QuestionForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>

    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'text')->widget(TinyMCE::className(), [
                'presetPath' => '@app/config/tinymce.php',
                'clientOptions' => [
                    'height' => 400,
                ],
            ]) ?>

            <?= $form->field($model, 'answers')->widget(
                MultipleInput::className(), [
                    'max' => 10,
                    'min' => 1, // should be at least 2 rows
                    'allowEmptyList' => false,
                    'enableGuessTitle' => true,
                    'addButtonPosition' => MultipleInput::POS_HEADER,
                    'columns' => [
                        [
                            'title' => Yii::t('app', 'Correct'),
                            'name' => 'correct_answer',
                            'type' => 'checkbox',
                        ],
                        [
                            'title' => Yii::t('app', 'Text'),
                            'name' => 'text',
                            'type' => TinyMCE::class,
                            'options' => [
                                'clientOptions' => [
                                    'toolbar' => 'bold italic | bullist numlist outdent indent | link image',
                                    'menubar' => false,  // Menubarni o'chirish
                                    'plugins' => [
                                        'code',
                                        'image',
                                        'media',
                                        'table'
                                    ],
                                    'height' => 200,
                                ]
                            ]
                        ]
                    ]
                ]
            ) ?>

        </div>
        <div class="col-md-3">
            <?php if ($test_id = get('test_id') || $test_id = $model->test_id): ?>
                <?php if ($test = Test::findOne(['id' => $test_id])): ?>
                    <?= $form->field($model, 'subject_id')
                        ->hiddenInput(['value' => $test->subject_id])
                        ->label(false) ?>
                    <?= $form->field($model, 'test_id')
                        ->hiddenInput(['value' => $test->id])
                        ->label(false) ?>
                <?php endif; ?>
            <?php else: ?>
                <?= $form->field($model, 'subject_id')->dropDownList(
                    ModelsToArray::getSubject(),
                    [
                        'prompt' => Yii::t('app', '--Select Subject--'),
                    ]
                ) ?>
                <?= $form->field($model, 'test_id')->dropDownList(
                    ModelsToArray::getTest(),
                    [
                        'prompt' => Yii::t('app', '--Select Test--'),
                    ]
                ) ?>
            <?php endif; ?>

            <?= $form->field($model, 'bal')->input('number') ?>


            <?= $form->field($model, 'status')->checkbox() ?>


            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
