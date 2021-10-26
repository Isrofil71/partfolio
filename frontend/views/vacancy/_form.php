<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Profession;
use frontend\models\JobType;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'profession_id')->dropDownList(
        Profession::selectList(),
        [
            'prompt' => 'Turini tanlang'
        ] 
    ) ?>

    <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_oz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_type_id')->dropDownList(
        JobType::selectList(),
        [
            'prompt' => 'Turini tanlang'
        ] 
    ) ?>
`
    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'count_vacancy')->textInput() ?>   

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'experience')->textInput() ?>

    <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
