<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "selected_test".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $date
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 * @property HistoryOfSolution[] $historyOfSolutions
 * @property SelectedTestItem[] $selectedTestItems
 */
class SelectedTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'selected_test';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
                'updatedAtAttribute' => false,
            ],
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'created_at'], 'safe'],
            [['description'], 'string'],
            [['created_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'date' => Yii::t('app', 'Date'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[HistoryOfSolutions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\HistoryOfSolutionQuery
     */
    public function getHistoryOfSolutions()
    {
        return $this->hasMany(HistoryOfSolution::class, ['selected_test_id' => 'id']);
    }

    /**
     * Gets query for [[SelectedTestItems]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\SelectedTestItemQuery
     */
    public function getSelectedTestItems()
    {
        return $this->hasMany(SelectedTestItem::class, ['selected_test_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\SelectedTestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\SelectedTestQuery(get_called_class());
    }
}
