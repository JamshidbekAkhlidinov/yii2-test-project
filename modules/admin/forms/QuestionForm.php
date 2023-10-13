<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 18:57:7
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use app\enums\StatusEnum;
use app\models\Answer;
use app\models\Question;
use app\models\Subject;
use app\models\Test;
use Yii;
use yii\base\Model;

class QuestionForm extends Model
{
    public $subject_id;
    public $test_id;
    public $text;
    public $status;
    public $bal;

    public array $answers;


    public function __construct(public Question $question, $config = [])
    {
        $this->answers = $this->initAnswers($question);
        $this->subject_id = $question->subject_id;
        $this->test_id = $question->test_id;
        $this->text = $question->text;
        $this->status = $question->status;
        $this->bal = $question->bal;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['subject_id', 'test_id', 'status'], 'integer'],
            [['text'], 'string'],
            [['bal'], 'number'],
            [['created_at'], 'safe'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::class, 'targetAttribute' => ['test_id' => 'id']],
            [['answers'], 'validateAnswers']
        ];
    }

    public function validateAnswers($attribute)
    {
        $answers = $this->{$attribute};

        if (!is_array($answers)) {
            $this->addError('answers', Yii::t('app', 'Answers must be an array'));
            return false;
        }

        foreach ($answers as $answer) {
            if (!isset($answer['text']) || !isset($answer['correct_answer'])) {
                $this->addError('answers', Yii::t('app', 'Error entering a response '));
                return false;
            }
        }
        return true;
    }

    public function save()
    {
        $model = $this->question;
        $isSave = true;
        $translation = \Yii::$app->db->beginTransaction();
        try {
            $model->subject_id = $this->subject_id;
            $model->test_id = $this->test_id;
            $model->text = $this->text;
            $model->status = $this->status;
            $model->bal = $this->bal;
            if ($model->save()) {
                $this->saveAnswers($model);
            }
            $translation->commit();
        } catch (\Exception $exception) {
            $isSave = false;
            $translation->rollBack();
            setFlash('danger', $exception->getMessage());
        }
        return $isSave;
    }


    private function initAnswers(Question $question)
    {
        $answers = [];
        $answersModel = Answer::find()
            ->andWhere(['question_id' => $question->id])
            ->all();
        foreach ($answersModel as $answer) {
            $answers[] = [
                'correct_answer' => $answer->correct_answer,
                'text' => $answer->text,
            ];
        }

        return $answers;
    }

    private function saveAnswers(Question $model)
    {
        Answer::deleteAll(['question_id' => $model->id]);
        foreach ($this->answers as $answer) {
            $answer = new Answer([
                'question_id' => $model->id,
                'text' => $answer['text'],
                'subject_id' => $model->subject_id,
                'test_id' => $model->test_id,
                'status' => StatusEnum::ACTIVE,
                'correct_answer' => $answer['correct_answer'],
            ]);
            $answer->save();
        }
    }


}