<?php


namespace frontend\controllers;


use common\models\Company;
use common\models\Region;
use common\models\User;
use common\models\Worker;
use common\models\City;
use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class DashboardController extends Controller
{
    public $layout = 'cabinet';

    public function actionWorker(){

        $model = $this->findWorker(Yii::$app->user->identity->getId());
        $user = User::findOne($model->userId);
        if ($user->regionId && $user->cityId){
            $model->regionId = $user->regionId;
            $model->cityId = $user->cityId;
        }

        return $this->render('worker', [
            'model' => $model
        ]);
    }

    public function actionEditWorker(){

        if (!$this->findWorker(Yii::$app->user->identity->getId())){
            return $this->redirect('worker-create');
        }

        if (Yii::$app->request->post()){
            $model = Worker::findOne(['userId' => Yii::$app->user->identity->getId()]);
            $model->scenario = Worker::SCENARIO_CREATE;
            $model->load(Yii::$app->request->post());

            $upload_flag = true;
            if ($model->photo_user = UploadedFile::getInstance($model, 'photo_user')) {
                if (!$model->upload()){
                    $upload_flag = false;
                }
            }
            if ($model->save() && $upload_flag){

                $user = User::findOne(Yii::$app->user->identity->getId());
                $user->regionId = $model->regionId;
                $user->cityId = $model->cityId;
                $user->save();

                return $this->redirect('/dashboard/worker');
            }
        }

        $model = Worker::findOne(['userId' => Yii::$app->user->identity->getId()]);
        $user = User::findOne($model->userId);
        $model->regionId = $user->regionId;
        $model->cityId = $user->cityId;

        return $this->render('edit-worker', [
            'model' => $model
            ]
        );
    }

    public function actionWorkerCreate(){

        if ($this->findWorker(Yii::$app->user->identity->getId())){
            return $this->redirect('edit-worker');
        }

        $model = new Worker();

        $model->scenario = Worker::SCENARIO_CREATE;
        $model->userId = Yii::$app->user->identity->getId();

        if ($model->load(Yii::$app->request->post()))
        {
            $upload_flag = true;
            if ($model->photo_user = UploadedFile::getInstance($model, 'photo_user')) {
                if (!$model->upload()){
                    $upload_flag = false;
                }
            }
            if ($model->save() && $upload_flag){
                $user = User::findOne(Yii::$app->user->identity->getId());
                $user->regionId = $model->regionId;
                $user->cityId = $model->cityId;
                $user->save();
            }

            return $this->redirect('/dashboard/worker');
        }

        return $this->render('worker-create', [
            'model' => $model
        ]);
    }

    public  function actionIndex(){
        $id = \Yii::$app->user->getId();
        $model = $this->findModel($id);

        return $this->render('index', ['model' => $model]);
    }

    public function actionEdit(){

        $id = \Yii::$app->user->getId();
        $company = $this->findModel($id);
        $company->scenario = Company::SCENARIO_CABINET;

        if ($company->load(\Yii::$app->request->post()))
        {
            $upload_flag = true;
            if ($company->imgLogo = UploadedFile::getInstance($company, 'imgLogo')) {
                if (!$company->upload()){
                    $upload_flag = false;
                }
            }
            if ($company->save() && $upload_flag){
                Yii::$app->session->setFlash('success', "O'zgarish saqlandi");
            }else{
                Yii::$app->session->setFlash('error', 'Nimadadir xato bo`ldi!');
            }
        }

        return $this->render('edit', ['company' => $company]);

    }

    protected function findModel($id)
    {
        if ($model = Company::findOne(['userId' => $id])) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findWorker($id)
    {
        if ($model = Worker::findOne(['userId' => $id])) {
            return $model;
        }

        return false;
    }

    public function actionCyrlLat(){
        $models = Region::find()->all();
        foreach ($models as $model){
            $model->name_en = cyrllat($model->name_oz);
            $model->name_uz = cyrllat($model->name_oz);
            $model->name_ru = $model->name_oz;
            if ($model->save()){
                echo $model->name_en . 'Yangilandi. <br>';
            }else{
                echo $model->name_en . " da o'zgairsh bo'lmadi. <br>";
            }
        }
    }
}