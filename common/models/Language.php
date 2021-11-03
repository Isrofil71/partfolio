<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $name_oz
 *
 * @property WorkerLanguage[] $workerLanguages
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'name_oz'], 'string', 'max' => 255],
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
            'name_oz' => Yii::t('app', 'Name Oz'),
        ];
    }

    /**
     * Gets query for [[WorkerLanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerLanguages()
    {
        return $this->hasMany(WorkerLanguage::className(), ['language_id' => 'id']);
    }
}
