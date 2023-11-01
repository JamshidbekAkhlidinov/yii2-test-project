<?php

namespace app\modules\admin;

use app\enums\UserRoleEnum;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'controllers' => ['admin/site'],
                        'actions' => ['login','signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'controllers' => ['admin/site'],
                        'actions' => ['error','logout'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'roles' => [UserRoleEnum::ADMINISTRATOR,UserRoleEnum::MANAGER],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'rbac' => \app\modules\admin\modules\rbac\Module::class
        ];

        // custom initialization code goes here
    }
}
