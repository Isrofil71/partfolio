<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'firstname',
        'lastname',
        'patronymic',
        'birthdate',
        'gender',
        'nationality_id',
        [
            'attribute' => 'region_id',
            'value' => $model->region->name_oz
        ],
        [
            'attribute' => 'city_id',
            'value' => $model->city->name_oz
        ],
        'address',
        'phone',
        [
            'attribute' => 'photo',
            'value' => '@web/'.$model->photo,
            'format' => ['image',['width'=>'150']],
        ],
        'created_at',
        'updated_at',
    ],
]);

?>


<?= Html::a( Yii::t('app', 'Edit'), '/dashboard/edit-worker', ['class' => 'btn btn-success px-5']) ?>

