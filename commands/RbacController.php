<?php

namespace app\commands;

use app\enums\UserRoleEnum;
use app\models\User;
use yii\console\Controller;


class RbacController extends Controller
{
    public function actionAddRoles()
    {
        $auth = \Yii::$app->authManager;
        foreach (UserRoleEnum::LIST as $key => $role) {
            try {
                $creteRole = $auth->createRole($key);
                $auth->add($creteRole);
                echo "Created ROLE: " . $role . " \n";
                if ($userModel = User::findOne(['username' => $key])) {
                    $auth->assign($creteRole, $userModel->id);
                    echo "assign user: " . $userModel->username . ", role: " . $role . " \n";
                }
            } catch (\Exception $exception) {
                echo "already Created ROLE: " . $role . " \n";
            }
        }
    }

    public function actionRemoveRoles()
    {
        $auth = \Yii::$app->authManager;
        foreach (UserRoleEnum::LIST as $key => $role) {
            try {
                $auth->remove($auth->getRole($key));
                echo "remove ROLE: " . $role . " \n";
            } catch (\Exception $exception) {
                echo "already remove ROLE: " . $role . " \n";
            }
        }
    }
}
