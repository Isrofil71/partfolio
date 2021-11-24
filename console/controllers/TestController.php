<?php
namespace console\controllers;

use yii\console\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        for ($i=0; $i < 100; $i++) { 
            echo $i. "\n";
        }
    }
}
?>