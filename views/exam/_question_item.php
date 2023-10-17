<?php
/*
 *   Jamshidbek Akhlidinov
 *   14 - 10 2023 14:12:2
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $model app\models\Question
 */

use app\enums\StatusEnum;

?>


<div class="card mb-3" style="width:100%;">
    <div class="card-body">
        <p class="card-text">
            <?= $model->text ?>
        </p>
        <input type="hidden" name="question[<?= $model->id ?>][]">
    </div>
    <ul class="list-group list-group-flush">
        <?php
        $answerCount = $model->getAnswers()
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
        $answers = $model->getAnswers()->all();
        shuffle($answers);
        foreach ($answers as $answer): ?>
            <li class="list-group-item">
                <label for="question[<?= $model->id ?>][<?= $answer->id ?>]" class=" d-flex">
                    <input
                            class="<?= $answerCount == 0 ? "form-control" : "form-check-input" ?> me-1"
                            id="question[<?= $model->id ?>][<?= $answer->id ?>]"
                            name="question[<?= $model->id ?>][]"
                            type="<?= $inputType ?>"
                            value="<?= $answerCount == 0 ? "" : $answer->id ?>"
                    >
                    <?= $answerCount == 0 ? "" : $answer->text ?>
                </label>
            </li>
        <?php endforeach; ?>
    </ul>
</div>