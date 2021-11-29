<?php


namespace common\models;


use yii\base\Model;
use yii\web\UploadedFile;

class Import extends Model
{

    /**
     * @var UploadedFile
     */
    public $importFile;

    public function rules()
    {
        return [
            [['importFile'], 'file'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->importFile->saveAs('uploads/' . $this->importFile->baseName . '.' . $this->importFile->extension);
            return true;
        } else {
            return false;
        }
    }
}