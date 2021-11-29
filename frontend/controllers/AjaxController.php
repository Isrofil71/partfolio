<?php


namespace frontend\controllers;


use common\models\City;
use common\models\Company;
use frontend\models\Region;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionCities($id)
    {
        $cities = City::selectList($id);
        $data = '';

        foreach ($cities as $cityId => $name)
        {
            $data .= "<option value='{$cityId}'>{$name}</option>";
        }
        return $data;
    }

    public function actionCompany()
    {
        $params = \Yii::$app->request->queryParams;
        if (isset($params['q']) and strlen($params['q']) > 2) {
            $companyes = Company::find()->where(['like', 'name', trim($params['q'])])->asArray()->all();

            $data = [];
            if ($companyes) {
                foreach ($companyes as $company) {
                    $data[] = [
                        'id' => $company['id'],
                        'text' => $company['name'],
                    ];
                }
            }
            return json_encode(['results' => $data]);
        }else{
            return json_encode(['results' => []]);
        }
    }
}