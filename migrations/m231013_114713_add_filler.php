<?php

use app\enums\UserRoleEnum;
use app\models\User;
use yii\db\Migration;

/**
 * Class m231013_114713_add_filler
 */
class m231013_114713_add_filler extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        foreach (UserRoleEnum::LIST as $key => $value) {

            $user = new User([
                'username' => $key,
                'auth_key' => security()->generateRandomString(),
                'access_token' => security()->generateRandomString(),
                'password_hash' => security()->generatePasswordHash($key),
                'email' => $key . "@gmail.com",
                'first_name' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => User::STATUS_ACTIVE,
                'verification_token' => security()->generateRandomString(),
            ]);
            if ($user->save()) {
                try {
                    $role = $auth->createRole($key);
                    $auth->add($role);
                    $auth->assign($role, $user->id);
                }catch (Exception $e) {
                    print_r($e->getMessage());
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['username' => UserRoleEnum::LIST]);
    }

}
