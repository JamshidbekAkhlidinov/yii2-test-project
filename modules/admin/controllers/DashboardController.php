<?php
/*
 *   Jamshidbek Akhlidinov
 *   1 - 10 2023 22:20:14
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\controllers;

use app\modules\admin\forms\PasswordForm;
use app\models\User;
use Yii;


class DashboardController extends DefaultController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
        $user = User::findOne(user()->identity->id);
        $password = new PasswordForm();
        if ($user->load(Yii::$app->request->post())) {
            if ($user->save()) {
                setFlash('success', 'Muvafaqqiyatli o\'zgartirildi');
            } else {
                setFlash('warning', "Saqlashda xatolik");
            }
        } else
            if ($password->load(Yii::$app->request->post())) {
                if ($user->validatePassword($password->password)) {
                    $user->setPassword($password->password2);
                    if ($user->save()) {
                        setFlash('success', "Successfully updated password");
                    } else {
                        setFlash('warning', "Save is error");
                    }
                } else {
                    setFlash('error', "Error password");
                }
                return $this->redirect(['/dashboard/profile']);
            }
        return $this->render('profile', ['user' => $user, 'password' => $password]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
