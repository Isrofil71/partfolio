<?php

namespace frontend\controllers;

use common\models\Appeals;
use common\models\Company;
use common\models\JobType;
use common\models\Partners;
use common\models\Region;
use common\models\Statistic;
use common\models\Vacancy;
use common\models\Worker;
use frontend\models\Report;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VacancySearch;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $partners = Partners::find()->where(['status' => 1])->orderBy(['order' => SORT_ASC])->all();
        $statistics = Statistic::findOne(1);
        $vacancys = Vacancy::find()->limit(8)->all();
        $region = Region::selectList();
        $company = Company::selectList();
        $job_type = JobType::selectList();

        $query = Vacancy::find();

        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 4
        ]);

        $results_map = Report::MapJoin();

        $searchModel = new VacancySearch();
        
        return $this->render('index', [
            'partners' => $partners,
            'statistics' => $statistics,
            'vacancys' => $vacancys,
            'pagination' => $pagination,
            'results_map' => $results_map,
            'region' => $region,
            'company' => $company,
            'job_type' => $job_type,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            vd($this->findModel($model));
            if ($this->findModel($model->user->id)){
                return $this->redirect('/dashboard/');
                
            }else{
                
                return  $this->redirect('/dashboard/worker');
            }

        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new Appeals();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Murotaatingiz muvaffqqiyatli yuborildi!.');
            } else {
                Yii::$app->session->setFlash('error', 'Yuborishda xatolik sodir bo`ldi.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister(){

        return $this->render('register');

    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $user = new SignupForm();
        $company = new Company();
        $company->scenario = Company::SCENARIO_SIGNUP;
        if ($company->load(Yii::$app->request->post())) {
            $user->username = $company->username;
            $user->password = $company->password;
            $user->email = $company->email;
            $user->status = 9;
            $user->role = 'company';
           
            if ($user = $user->signup()){
                if (UploadedFile::getInstance($company, 'imgLogo')){
                    $company->imgLogo = UploadedFile::getInstance($company, 'imgLogo');
                    $company->logo = 'img/company/' . $company->imgLogo->baseName . '.' . $company->imgLogo->extension;
                    $company->userId = $user->id;

                    if ($company->upload() && $company->save()){
                        Yii::$app->session->setFlash('success', 'Sizning korxonzngiz muvoffaqqiyatli qo`shildi.');
                    }else{
                        Yii::$app->session->setFlash('error', 'Nimadadir xato boldi!');
                    }
                    return $this->refresh();
                }
            }            
        }

        return $this->render('signup', [
            'company' => $company,
        ]);
    }

    public function actionSignupWorker(){

        $user = new SignupForm();

        if ($user->load(Yii::$app->request->post())){
//            $user->status = 10;
            $user->role = 'worker';
            if ($user->signup()){
                Yii::$app->session->setFlash('success', 'Siz muvoffaqqiyatli ro`yxatdan o`tdingiz.');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Nimadadir xato boldi!');
            }
        }

        return $this->render('signup-worker', [
            'worker' => $user
        ]);

    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    protected function findModel($id)
    {
        if ((Company::findOne(['userId' => $id])) !== null) {
            return true;
        }else{
            return  false;
        }
    }
}
