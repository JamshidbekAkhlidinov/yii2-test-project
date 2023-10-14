<?php

namespace app\models\query;

use app\enums\StatusEnum;

/**
 * This is the ActiveQuery class for [[\app\models\Test]].
 *
 * @see \app\models\Test
 */
class TestQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return \app\models\Test[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Test|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
