<?php
/*
 *   Jamshidbek Akhlidinov
 *   14 - 10 2023 13:40:1
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $test app\models\Test
 */

use yii\bootstrap5\Html;

?>
<h2 class="text-center">
    Test mavzusi yoki raqamini tanlang!
</h2>


<div class="d-flex justify-content-center">
    <div class="list-group w-25">
        <?php foreach ($dataProvider->getModels() as $test) : ?>
            <?= Html::a(
                $test->title,
                [
                    'exam/question',
                    'test_id' => $test->id,
                    'subject_id' => request()->get('subject_id'),
                ],
                [
                    'class' => 'list-group-item list-group-item-action list-group-item-primary'
                ]
            ); ?>

        <?php endforeach; ?>
    </div>

</div>