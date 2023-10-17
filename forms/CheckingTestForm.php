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
use yii\base\Model;

class CheckingTestForm extends Model
{
    public $count = 0;
    public $bal = 0;

    public array $answers;

    public function __construct(
        public $subject_id,
        public $test_id,
        public $questions,
               $config = []
    )
    {
        parent::__construct($config);
    }


    public function check()
    {
        $subject_id = $this->subject_id;
        $test_id = $this->test_id;
        $question_ids = $this->questions;
        $count = 0;
        $bal = 0;
        $bodyAnswers = [];
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

            if (isset($answer_ids[0]) && empty($answer_ids[0])) {
                unset($answer_ids[0]);
            }
            foreach ($answer_ids as $id) {
                if (in_array($id, array_column($answers, 'id'))) {
                    $correct_answer_count++;
                }
            }

            $questionModel = Question::findOne(['id' => $question_id]);

            $bodyAnswers[$questionModel->id] = [
                'question' => $questionModel->text,
                'answers' => $questionModel
                    ->getAnswers()
                    ->select(['id', 'text'])
                    ->asArray()
                    ->all(),
                'correct_answer' => $answer_ids,
            ];

            if (count($answers) == $correct_answer_count && $correct_answer_count != 0) {
                $bal += $questionModel->bal;
                $count++;
            }
            if ($correct_answer_count == 0) {
                $answer = Answer::findOne([
                    'test_id' => $test_id,
                    'subject_id' => $subject_id,
                    'question_id' => $question_id,
                ])->text;
                $answerText = strtolower(strip_tags($answer));
                $replyText = isset($answer_ids[1]) ? strtolower($answer_ids[1]) : "";
                if ($answerText == $replyText) {
                    $bal += $questionModel->bal;
                    $count++;
                }
            }
        }
        $this->setCorrectCount($count);
        $this->setBal($bal);
        $this->setAnswers($bodyAnswers);
        return true;
    }


    public function getTestCount()
    {
        return Question::find()->andWhere([
            'subject_id' => $this->subject_id,
            'test_id' => $this->test_id,
        ])->count();
    }

    private function setCorrectCount($correctCount)
    {
        $this->count = $correctCount;
    }

    public function getCorrectCount()
    {
        return $this->count;
    }

    private function setBal($bal)
    {
        $this->bal = $bal;
    }

    public function getBal()
    {
        return $this->bal;
    }

    private function setAnswers($bodyAnswers)
    {
        $this->answers = $bodyAnswers;
    }

    public function getAnswers()
    {
        return $this->answers;
    }
}