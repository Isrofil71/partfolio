<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('/jobboard/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!-- <h1 class="text-white font-weight-bold">Home</h1> -->
                <div class="custom-breadcrumbs">
                   <!-- <a href="/">Home</a> <span class="mx-2 slash">/</span> -->
<!--                    <span class="text-white"><strong>Contact Us</strong></span>-->
                </div>
            </div>
        </div>
    </div> 
</section>

<div class="container site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div  style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                    <br>
                    Ro'yxatdan o'tmaganmisiz? <?= Html::a(Yii::t('app', 'signup'), '/site/register') ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>  
