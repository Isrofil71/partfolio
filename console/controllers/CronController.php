<?php
namespace console\controllers;

use yii\console\Controller;
use frontend\models\SignupForm;
use Yii;
class CronController extends Controller
{
    public function actionSendMail()
    {
        $mails = [
            'wertprogram@mail.ru',
            'khurramovisrofil07@gmail.com'
        ];
        foreach($mails as $mail){
            $model = new SignUpForm();

            $model->username = 'wertprogram';
            $model->password = '12345678';
            $model->email = $mail;
            $result = Yii::$app->mailer->compose(
               // ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $model]
            )
            ->setFrom(["wertprogram@mail.ru" => Yii::$app->name, 'robot'])
            ->setTo($mail)
            ->setSubject('Account registration at ' . Yii::$$app->name)
            ->send();

            echo $mail. " -> " .$result. "\n";
        }
        
    }
}
?>