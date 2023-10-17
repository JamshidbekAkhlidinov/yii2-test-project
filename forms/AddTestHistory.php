<?php
/*
 *   Jamshidbek Akhlidinov
 *   16 - 10 2023 18:51:25
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\forms;

use app\models\HistoryOfSolution;
use yii\base\Model;

class AddTestHistory extends Model
{
    public $subject_id;
    public $test_id;
    public $selected_test_id;
    public $bal;
    public $correct_answers_count;
    public $answers;
    public $all_ball;
    public $count_question;


    public function __construct(public HistoryOfSolution $model, $config = [])
    {
        parent::__construct($config);
    }

    public function save()
    {
        $model = $this->model;
        $model->subject_id = $this->subject_id;
        $model->test_id = $this->test_id;
        $model->all_ball = $this->all_ball;
        $model->count_question = $this->count_question;
        $model->selected_test_id = $this->selected_test_id;
        $model->ball = $this->bal;
        $model->correct_answers_count = $this->correct_answers_count;
        $model->answers = json_encode($this->answers, JSON_PRETTY_PRINT);
        return $model->save();
    }
}