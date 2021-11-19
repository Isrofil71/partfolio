<?php


namespace frontend\models;
use yii\base\Model;
use \yii\db\Query;


class Report extends Model
{
    public static function MapJoin(){

        $rows = (new Query())
            ->select(['company.name', 'count(*)'])
            ->from('vacancy')
            ->innerJoin('company', 'vacancy.company_id = company.id')
            ->groupBy('company_id')
            ->all();
        return $rows;
    }
}
?>