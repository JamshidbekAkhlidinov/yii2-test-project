<?php

namespace app\controllers;

use app\enums\StatusEnum;
use app\forms\CheckingTestForm;
use app\models\Answer;
use app\models\Question;
use app\models\Subject;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;

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
        $query = Question::find()
            ->andWhere(['test_id' => $test_id])
            ->orderBy('RAND()'); // Random tartibda olish uchun ORDER BY RAND()


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('question', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCheck()
    {
        if (request()->post()) {
            $subject_id = $post = request()->post('subject_id');
            $test_id = $post = request()->post('test_id');
            $question_ids = $post = request()->post('question', []);

            $form = new CheckingTestForm($subject_id, $test_id, $question_ids);
            $form->check();

            return $this->render('answer', [
                'questionCount' => $form->getTestCount(),
                'checking_count' => $form->getCorrectCount(),
            ]);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'success' => false,
            'message' => "Error request"
        ];
    }
}