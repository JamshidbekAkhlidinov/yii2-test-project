<?php

namespace app\modules\admin\modules\rbac\query;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\modules\rbac\models\AuthRule]].
 *
 * @see \app\modules\admin\modules\rbac\models\AuthRule
 */
class AuthRuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\rbac\models\AuthRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\rbac\models\AuthRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
