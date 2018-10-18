<?php
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Create a Conference Chair Account');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="content">
        <div class="site-signup site-custom">
            <div class="col-lg-12 well bs-component">

                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'fname') ?>
                <?= $form->field($model, 'lname') ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'retypeEmail') ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '{input} {image}', 'options'=>['class'=>'form-control','placeholder' => "Enter Given Text"]])->label('Enter Code') ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Continue'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>