<?php

namespace app\modules\admin\modules\rbac;

use app\enums\UserRoleEnum;

/**
 * rbac module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\modules\rbac\controllers';

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [UserRoleEnum::ADMINISTRATOR],
                    ],
                ],
            ],
        ];
    }


    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
