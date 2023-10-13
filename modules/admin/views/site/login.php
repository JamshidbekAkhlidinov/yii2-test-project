<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var $model app\modules\admin\forms\LoginForm
 */

$this->title = 'Login';
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'password')->passwordInput() ?>

    <div class="row">
        <div class="col-xs-8">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary ', 'name' => 'login-button']) ?>
    </div>

<?php ActiveForm::end(); ?>