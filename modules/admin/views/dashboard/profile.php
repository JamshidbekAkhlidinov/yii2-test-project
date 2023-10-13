<?php

use backend\forms\PasswordForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $user common\models\User
 * @var $password PasswordForm
 */

$admin = $user;

$this->title = "Assalomu alaykum " . $admin->username;
$this->params['title'] = $this->title;


?>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="<?= Url::to('@web/img/user.png') ?>"
                         alt="User profile picture">
                    <h3 class="profile-username text-center"><?= $admin->username ?></h3>
                    <p class="text-muted text-center">Adminstrator</p>
                    <a href="<?= Url::to(['/site/logout']) ?>" class="btn btn-primary btn-block"><b>Chiqish</b></a>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">About Me</a></li>
                    <li><a href="#timeline" data-toggle="tab">Edit name</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                        <div class="">

                            <div class="box-body">
                                <strong>
                                    <i class="fa fa-user margin-r-5"></i>
                                    First name
                                </strong>
                                <p class="text-muted">
                                    <?= $admin->first_name ?>
                                </p>
                                <hr>
                                <strong>
                                    <i class="fa fa-user margin-r-5"></i>
                                    Last name
                                </strong>
                                <p class="text-muted">
                                    <?= $admin->last_name ?>
                                </p>
                                <hr>
                                <strong>
                                    <i class="fa fa-user margin-r-5"></i>
                                    Patronymic
                                </strong>
                                <p class="text-muted">
                                    <?= $admin->patronymic ?>
                                </p>
                                <hr>
                                <strong>
                                    <i class="fa fa-user margin-r-5"></i>
                                    username
                                </strong>
                                <p class="text-muted">
                                    <?= $admin->username ?>
                                </p>
                                <hr>
                                <strong>
                                    <i class="fa fas fa-envelope margin-r-5"></i>
                                    Email
                                </strong>
                                <p class="text-muted"><?= $admin->email ?></p>
                                <hr>
                            </div>

                        </div>


                    </div>

                    <div class="tab-pane" id="timeline">

                        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>

                        <?= $form->field($user, 'first_name', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput() ?>
                        <?= $form->field($user, 'last_name', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput() ?>
                        <?= $form->field($user, 'patronymic', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput() ?>
                        <?= $form->field($user, 'username', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput() ?>
                        <?= $form->field($user, 'email', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput() ?>
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                        <?php ActiveForm::end(); ?>

                    </div>

                    <div class="tab-pane" id="settings">
                        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
                        <?= $form->field($password, 'password', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput() ?>
                        <?= $form->field($password, 'password1', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput() ?>
                        <?= $form->field($password, 'password2', ['template' => '<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput() ?>
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success col-sm-offset-2']) ?>
                        <?php ActiveForm::end(); ?>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>