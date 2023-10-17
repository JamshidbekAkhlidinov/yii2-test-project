<?php
/*
 *   Jamshidbek Akhlidinov
 *   17 - 10 2023 17:3:50
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model app\models\SelectedTestItem
 */

use app\enums\StatusEnum;
use app\models\Question;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php $form = ActiveForm::begin(['action' => ['exam/check']]); ?>

<input type="hidden" name="selected_test_id" value="<?= request()->get('id') ?>">

<?php foreach ($dataProvider->getModels() as $model): ?>

    <?php $questions = Question::find()
        ->andWhere(['subject_id' => $model->subject_id])
        ->limit($model->count)
        ->orderBy('RAND()')
        ->all();
    foreach ($questions as $question) :?>

        <div class="card mb-3" style="width:100%;">
            <div class="card-body">
                <p class="card-text">
                    <?= $question->text ?>
                </p>
                <input type="hidden" name="question[<?= $question->id ?>][]">
            </div>
            <ul class="list-group list-group-flush">
                <?php
                $answerCount = $question->getAnswers()
                    ->andWhere([
                        'correct_answer' => StatusEnum::ACTIVE
                    ])
                    ->count();
                $inputType = 'radio';
                if ($answerCount == 0) {
                    $inputType = 'text';
                }
                if ($answerCount >= 2) {
                    $inputType = 'checkbox';
                }
                ?>
                <?php
                $answers = $question
                    ->getAnswers()
                    ->orderBy("RAND()")
                    ->all();

                shuffle($answers);
                foreach ($answers as $answer): ?>
                    <li class="list-group-item">
                        <label for="question[<?= $question->id ?>][<?= $answer->id ?>]" class=" d-flex">
                            <input
                                    class="<?= $answerCount == 0 ? "form-control" : "form-check-input" ?> me-1"
                                    id="question[<?= $question->id ?>][<?= $answer->id ?>]"
                                    name="question[<?= $question->id ?>][]"
                                    type="<?= $inputType ?>"
                                    value="<?= $answerCount == 0 ? "" : $answer->id ?>"
                            >
                            <?= $answerCount == 0 ? "" : $answer->text ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php
    endforeach;
endforeach;
echo Html::submitButton(translate("Save"), ['class' => 'btn btn-primary mt-3']);

ActiveForm::end();
?>
