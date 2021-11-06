<?php

use mdm\admin\components\Helper;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use \yii\web\YiiAsset;
use mdm\admin\components\MenuHelper;

$menuItems = [
    [
        'label' => 'Logout (' . \Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ]
];

$menuItems = array_merge(
        MenuHelper::getAssignedMenu(Yii::$app->user->id),
        Helper::filter($menuItems)
);

echo Nav::widget([
    'items' => $menuItems, // MenuHelper::getAssignedMenu(Yii::$app->user->id),
    'options' => ['class' =>'nav-pills flex-column'],
]);
?>