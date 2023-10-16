<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "selected_test_item".
 *
 * @property int $id
 * @property int|null $selected_test_id
 * @property int|null $subject_id
 * @property int|null $count
 *
 * @property SelectedTest $selectedTest
 * @property Subject $subject
 */
class SelectedTestItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'selected_test_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['selected_test_id', 'subject_id', 'count'], 'integer'],
            [['selected_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => SelectedTest::class, 'targetAttribute' => ['selected_test_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'selected_test_id' => Yii::t('app', 'Selected Test ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'count' => Yii::t('app', 'Count'),
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
     * {@inheritdoc}
     * @return \app\models\query\SelectedTestItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\SelectedTestItemQuery(get_called_class());
    }
}
