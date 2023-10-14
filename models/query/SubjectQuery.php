<?php

namespace app\models\query;

use app\enums\StatusEnum;

/**
 * This is the ActiveQuery class for [[\app\models\Subject]].
 *
 * @see \app\models\Subject
 */
class SubjectQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['[[status]]' => StatusEnum::ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Subject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Subject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
