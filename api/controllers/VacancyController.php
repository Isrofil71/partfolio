<?php
    namespace api\controllers;

    use yii\rest\ActiveController;
    
    class VacancyController extends MyController
    {
        public $modelClass = 'api\models\Vacancy';


        public function actions(){
            $actions = parent::actions();
            unset($actions['index']);
            return $actions;
        }
    
        public function actionIndex(){
            $dataProveder = new ActiveDataProvider([
                'query' => Vacancy::find()->orderBy('salary DESC'),
                'pagination' => [
                    'pageSize' => 4
                ],
            ]);
            return $dataProveder;
        }

    }
?>