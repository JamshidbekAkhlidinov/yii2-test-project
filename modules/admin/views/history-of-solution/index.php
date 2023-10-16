<?php

use app\models\HistoryOfSolution;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\HistoryOfSolutionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'History Of Solutions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-of-solution-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create History Of Solution'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'subject.name',
            'test.title',
            'selectedTest.name',
            'user.username',
            //'date',
            'ball',
            'correct_answers_count',
            //'answers:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, HistoryOfSolution $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
