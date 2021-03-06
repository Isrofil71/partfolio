<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy_orders".
 *
 * @property int $id
 * @property int|null $company_id
 * @property int|null $vacancy_id
 * @property int|null $worker_id
 * @property int|null $status
 * @property int|null $company_view
 * @property int|null $worker_view
 * @property string|null $created_at
 * @property string|null $date_approval
 *
 * @property Company $company
 * @property Vacancy $vacancy
 * @property Worker $worker
 */
class VacancyOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
        const STATUSLIST = [
            0 => 'Sended',
            1 => 'Cencelled',
            2 => 'To the conversation',
            3 => 'Job offer',
        ];
        
    public static function tableName()
    {
        return 'vacancy_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'vacancy_id', 'worker_id', 'status', 'company_view', 'worker_view'], 'integer'],
            [['created_at', 'date_approval'], 'safe'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
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
            'company_id' => Yii::t('app', 'Company ID'),
            'vacancy_id' => Yii::t('app', 'Vacancy ID'),
            'worker_id' => Yii::t('app', 'Worker ID'),
            'status' => Yii::t('app', 'Status'),
            'company_view' => Yii::t('app', 'Company View'),
            'worker_view' => Yii::t('app', 'Worker View'),
            'created_at' => Yii::t('app', 'Created At'),
            'date_approval' => Yii::t('app', 'Date Approval'),
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Vacancy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'vacancy_id']);
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
