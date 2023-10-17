<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "history_of_solution".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $test_id
 * @property int|null $selected_test_id
 * @property int|null $user_id
 * @property string|null $date
 * @property float|null $ball
 * @property float|null $all_ball
 * @property integer|null $count_question
 * @property int|null $correct_answers_count
 * @property string|null $answers
 *
 * @property SelectedTest $selectedTest
 * @property Subject $subject
 * @property Test $test
 * @property User $user
 */
class HistoryOfSolution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_of_solution';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
                'updatedAtAttribute' => false,
                'createdAtAttribute' => 'date',
            ],
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
                'createdByAttribute' => 'user_id',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'test_id', 'selected_test_id', 'user_id', 'correct_answers_count'], 'integer'],
            [['date'], 'safe'],
            [['ball','all_ball','count_question'], 'number'],
            [['answers'], 'safe'],
            [['selected_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => SelectedTest::class, 'targetAttribute' => ['selected_test_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::class, 'targetAttribute' => ['test_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'test_id' => Yii::t('app', 'Test ID'),
            'selected_test_id' => Yii::t('app', 'Selected Test ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'date' => Yii::t('app', 'Date'),
            'ball' => Yii::t('app', 'Ball'),
            'correct_answers_count' => Yii::t('app', 'Correct Answers Count'),
            'answers' => Yii::t('app', 'Answers'),
        ];
    }

    /**
     * Gets query for [[SelectedTest]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SelectedTestQuery
     */
    public function getSelectedTest()
    {
        return $this->hasOne(SelectedTest::class, ['id' => 'selected_test_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SubjectQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TestQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::class, ['id' => 'test_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\HistoryOfSolutionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\HistoryOfSolutionQuery(get_called_class());
    }
}
