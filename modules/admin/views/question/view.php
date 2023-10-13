<?php

use app\models\Question;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Question $model */

$this->title = strip_tags($model->text);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subject.name',
            'test.title',
            'text:raw',
            'status',
            'bal',
            [
                'attribute' => 'answers',
                'format' => 'raw',
                'value' => static function (Question $model) {
                    $item = [];
                    foreach ($model->answers as $answer) {
                        $item[] = Html::tag(
                            'li',
                            $answer->text
                        );
                    }
                    return Html::tag('ol', implode('', $item), ['type' => 'A', 'id' => 'answers_list']);
                },
            ],
            'created_at',
            'createdBy.username',
        ],
    ]) ?>

</div>
