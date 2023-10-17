<?php
/*
 *   Jamshidbek Akhlidinov
 *   17 - 10 2023 16:40:32
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\bootstrap5\Html;

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 */


?>
<h2 class="text-center">
    Test nomini tanlang?
</h2>


<div class="d-flex justify-content-center">
    <div class="list-group w-25">
        <?php foreach ($dataProvider->getModels() as $subject) : ?>
            <?= Html::a(
                $subject->name,
                ['exam/selected-test-item', 'id' => $subject->id],
                [
                    'class' => 'list-group-item list-group-item-action list-group-item-primary'
                ]
            ); ?>
        <?php endforeach; ?>
    </div>

</div>

