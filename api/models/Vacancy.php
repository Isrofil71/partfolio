<?php
namespace api\models;

class Vacancy extends \common\models\Vacancy {
    public function fields(){
        return [
            'id',
            'profession' => function($model){
                return $model->profession ? $model->profession->name_uz : " ";
            },
            'image' => function($model){
                return "http://isrofil.smartdesign.uz/" . $model->image;
            },
            'company' =>function($model){
                return $model->company ? $model->company->name : " ";
            },
            'address',
            'jobtype' =>function($model){
                return $model->jobType ? $model->jobType->name_uz : " ";
            },
            'link' =>function($model){
                return 'http://isrofil.smartdesign.uz/vacancy/single?id=' . $model->id;
            },
        ];
    }
}
?>
