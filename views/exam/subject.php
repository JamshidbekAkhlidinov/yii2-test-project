<?php
/*
 *   Jamshidbek Akhlidinov
 *   14 - 10 2023 13:40:1
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $subject app\models\Subject
 */

use yii\bootstrap5\Html;

?>
<h2 class="text-center">
    Qaysi fandan test yechmoqchisiz?
</h2>


<div class="d-flex justify-content-center">
    <div class="list-group w-25">
        <?php foreach ($dataProvider->getModels() as $subject) : ?>
            <?= Html::a(
                $subject->name,
                ['exam/test', 'subject_id' => $subject->id],
                [
                    'class' => 'list-group-item list-group-item-action list-group-item-primary'
                ]
            ); ?>

        <?php endforeach; ?>
    </div>

</div>