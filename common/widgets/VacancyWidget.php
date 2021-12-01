<?php
namespace common\widgets;

use common\models\Vacancy;
use yii\base\Widget;
use yii\data\Pagination;
use yii\helpers\Html;

class VacancyWidget extends Widget
{
    public $count;

    public function init()
    {
        parent::init();
        if ($this->count === null) {
            $this->count = 10;
        }
    }

    public function run()
    {
        $vacancys = Vacancy::find()->limit($this->count)->all();
        $query = Vacancy::find();
        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 4
        ]);
        return $this->render('vacancy',
        [
            'pagination' => $pagination,
            'vacancys' => $vacancys
        ]); 
    }
}


?>