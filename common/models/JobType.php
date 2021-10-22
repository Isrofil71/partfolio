<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job_type".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $name_cyrl
 */
class JobType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'name_cyrl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_cyrl' => Yii::t('app', 'Name Cyrl'),
        ];
    }
}
