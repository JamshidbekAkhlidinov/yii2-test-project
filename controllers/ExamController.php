<?php

namespace app\controllers;

use app\models\Question;
use app\models\Subject;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ExamController extends Controller
{
    public function actionSubject()
    {
        $query = Subject::find()->active();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('subject', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionTest($subject_id)
    {
        $query = Test::find()->andWhere(['subject_id' => $subject_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('test', [
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionQuestion($test_id)
    {
        $query = Question::find()->andWhere(['test_id' => $test_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('question', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCheck()
    {
        if ($post = request()->post()) {
            echo "<pre>";
            print_r($post);
            echo "</pre>";
            exit();
        }
    }
}