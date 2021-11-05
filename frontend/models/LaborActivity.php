<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "labor_activity".
 *
 * @property int $id
 * @property int|null $worker_id
 * @property string|null $company_name
 * @property string|null $position
 * @property string|null $from_date
 * @property string|null $to_date
 *
 * @property Worker $worker
 */
class LaborActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'labor_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['company_name', 'position'], 'string', 'max' => 255],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::className(), 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'worker_id' => Yii::t('app', 'Worker ID'),
            'company_name' => Yii::t('app', 'Company Name'),
            'position' => Yii::t('app', 'Position'),
            'from_date' => Yii::t('app', 'From Date'),
            'to_date' => Yii::t('app', 'To Date'),
        ];
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['id' => 'worker_id']);
    }
}