<?php
/*
 *   Jamshidbek Akhlidinov
 *   1 - 10 2023 23:19:27
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use app\models\User;
use yii\base\Model;

class UserForm extends Model
{
    public User $user;
    public $username;
    public $email;
    public $first_name;
    public $last_name;
    public $patronymic;
    public $status;
    public $password;

    public function __construct(User $user, $config = [])
    {
        parent::__construct($config);
        $this->user = $user;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->patronymic = $user->patronymic;
        $this->status = $user->status;
    }

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['status'], 'integer'],
            [['email'], 'email'],
            [['username', 'password', 'email', 'first_name', 'last_name', 'patronymic'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    public function save()
    {
        $user = $this->user;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->patronymic = $this->patronymic;
        $user->status = $this->status;
        if (!empty($this->password)) {
            $user->password_hash = security()->generatePasswordHash($this->password);
            $user->auth_key = security()->generateRandomString();
        }
        return $user->save();
    }
}