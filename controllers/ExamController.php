<?php

namespace app\controllers;

use app\enums\StatusEnum;
use app\forms\AddTestHistory;
use app\forms\CheckingTestForm;
use app\models\Answer;
use app\models\HistoryOfSolution;
use app\models\Question;
use app\models\SelectedTest;
use app\models\SelectedTestItem;
use app\models\Subject;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class ExamController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionSelectedTest()
    {
        $query = SelectedTest::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('selected-test', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionSelectedTestItem($id)
    {
        $query = SelectedTestItem::find();
        $query->andWhere(['selected_test_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('selected-test_item', [
            'dataProvider' => $dataProvider
        ]);
    }


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
            ->orderBy('RAND()');


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
            $subject_id = request()->post('subject_id');
            $test_id = request()->post('test_id');
            $selected_test_id = request()->post('selected_test_id');
            $question_ids = request()->post('question', []);

            $form = new CheckingTestForm($subject_id, $test_id, $selected_test_id, $question_ids);
            $form->checkingTestType();

            $historyForm = new AddTestHistory(
                new HistoryOfSolution(),
                [
                    'subject_id' => $subject_id,
                    'test_id' => $test_id,
                    'all_ball' => $form->AllBall(),
                    'count_question' => $form->CountQuestion(),
                    'selected_test_id' => $test_id,
                    'bal' => $form->bal,
                    'correct_answers_count' => $form->getCorrectCount(),
                    'answers' => $form->getAnswers(),
                ]
            );
            $historyForm->save();

            return $this->render('answer', [
                'questionCount' => $form->getTestCount(),
                'checking_count' => $form->getCorrectCount(),
                'bal' => $form->getBal(),
            ]);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'success' => false,
            'message' => "Error request"
        ];
    }
}