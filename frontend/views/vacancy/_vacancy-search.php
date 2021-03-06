<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\VacancySearch */
/* @var $form yii\widgets\ActiveForm */

$profession = \common\models\Profession::selectList();
$region = \common\models\Region::selectList();
$job_type = \common\models\JobType::selectList();
$gender = \common\models\Gender::selectList();
$city = [];
?>

<div class="vacancy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['list'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'profession_id')->widget(Select2::classname(), [
        'data' => $profession,
        'language' => 'de',
        'options' => ['placeholder' => 'Select a profession ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'job_type_id')->widget(Select2::classname(), [
        'data' => $job_type,
        'language' => 'uz',
        'options' => ['placeholder' => 'Select a job type ...'],
        'pluginOptions' => [
            'label' => false,
            'allowClear' => true
        ],
    ]);
    ?>
 
    <?= $form->field($model, 'region_id')->dropDownList($region, ['prompt' => 'Select region'])
    ?>

<?= $form->field($model, 'city_id')->dropDownList($city, ['prompt' => 'Select city'])
    ?>

    <?= $form->field($model, 'gender')->dropDownList($gender, ['prompt' => 'Select a gender']) ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'from_salary')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'end_salary')->textInput(['type' => 'number']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Apply'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Reset'), 'list', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

