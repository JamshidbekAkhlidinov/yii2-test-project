<?php

namespace app\controllers;

use app\enums\StatusEnum;
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
        //\Yii::$app->response->format = Response::FORMAT_JSON;
        //return request()->post();
        $subject_id = $post = request()->post('subject_id');
        $test_id = $post = request()->post('test_id');
        $question_ids = $post = request()->post('question',[]);
        $questionCount = Question::find()->andWhere([
            'subject_id' => $subject_id,
            'test_id' => $test_id,
        ])->count();
        $count = 0;
        foreach ($question_ids as $question_id => $answer_ids) {
            $answers = Answer::find()
                ->andWhere(
                    [
                        'test_id' => $test_id,
                        'subject_id' => $subject_id,
                        'question_id' => $question_id,
                        'correct_answer' => StatusEnum::ACTIVE,
                    ]
                )
                ->asArray()
                ->all();
            $correct_answer_count = 0;
            foreach ($answer_ids as $id) {
                if (in_array($id, array_column($answers, 'id'))) {
                    $correct_answer_count++;
                }
            }

            if (count($answers) == $correct_answer_count && $correct_answer_count != 0) {
                $count++;
            }

            if ($correct_answer_count == 0) {
                $answer = Answer::findOne([
                    'test_id' => $test_id,
                    'subject_id' => $subject_id,
                    'question_id' => $question_id,
                ])->text;
                $answerText = strtolower(strip_tags($answer));
                $replyText = isset($answer_ids[0]) ? strtolower($answer_ids[0]) : "";
                if ($answerText == $replyText) {
                    $count++;
                }
            }

        }
        return $this->render('answer', [
            'questionCount' => $questionCount,
            'checking_count' => $count,
        ]);
    }
}