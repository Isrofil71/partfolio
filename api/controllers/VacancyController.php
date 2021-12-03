<?php
    namespace api\controllers;

    use yii\rest\ActiveController;
    
    class VacancyController extends ActiveController
    {
        public $modelClass = 'common\models\Vacancy';
    }
?>