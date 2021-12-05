<?php
    namespace api\controllers; 

    use yii\rest\ActiveController;

    class MyController extends ActiveController
    {
        public $serializer = [
            'class' => 'yii\rest\Serializer',
            'collectionEnvelope' => 'items',
        ];
        public function behaviors()
        {
            $behaviors = parent::behaviors();

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
            ],
        ];
        }
    }
?>