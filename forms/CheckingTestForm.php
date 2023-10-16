<?php
/*
 *   Jamshidbek Akhlidinov
 *   16 - 10 2023 18:34:33
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\forms;

use app\enums\StatusEnum;
use app\models\Answer;
use app\models\Question;

class CheckingTestForm
{
    public $count = 0;

    public function __construct(
        public $subject_id,
        public $test_id,
        public $questions)
    {

    }


    public function check()
    {
        $subject_id = $this->subject_id;
        $test_id = $this->test_id;
        $question_ids = $this->questions;
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
        $this->setCorrectCount($count);
        return true;
    }


    public function getTestCount()
    {
        return Question::find()->andWhere([
            'subject_id' => $this->subject_id,
            'test_id' => $this->test_id,
        ])->count();
    }

    public function setCorrectCount($correctCount)
    {
        $this->count = $correctCount;
    }

    public function getCorrectCount()
    {
        return $this->count;
    }
}