<?php
/*
 *   Jamshidbek Akhlidinov
 *   1 - 10 2023 22:15:28
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use yii\base\Model;


class PasswordForm extends Model
{
    public $password;
    public $password1;
    public $password2;


    public function rules()
    {
        return [
            [['password','password1','password2'],'required'],
            ['password', 'string', 'max' => 255],
            ['password1', 'string', 'max' => 255],
            ['password2', 'string', 'max' => 255],
        ];
    }

  public function attributeLabels()
  {
      return [
        'password'=>"Eski parol",
        'password1'=>"Yangi parol",
        'password2'=>"Yangi parol qayta",
      ];
  }

}
