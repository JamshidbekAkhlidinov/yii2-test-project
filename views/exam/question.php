<?php
/*
 *   Jamshidbek Akhlidinov
 *   14 - 10 2023 14:10:54
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>


<?php $form = ActiveForm::begin(['action' => ['exam/check']]); ?>

<input type="hidden" name="subject_id" value="<?=request()->get('subject_id')?>">
<input type="hidden" name="test_id" value="<?=request()->get('test_id')?>">

<?php
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_question_item',
    'layout' => "{items}\n",
    'itemOptions' => [
        'tag' => false,
    ],
    'options' => [
        'class' => 'd-flex justify-content-center flex-column',
        'id' => false,
    ]
]);

echo Html::submitButton(translate("Save"), ['class' => 'btn btn-primary mt-3']);

ActiveForm::end();

?>