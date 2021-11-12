<?php
use common\models\VacancyOrders;
use yii\helpers\Html;

$name = 'name_' . Yii::$app->language;
$i = 1;

$this->title = Yii::t('app', 'Orders');
?>
<table class="table table-dtriped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><?= Yii::t('app', 'Worker'); ?></th>
            <th scope="col"><?= Yii::t('app', 'Vacancy'); ?></th>
            <th scope="col"><?= Yii::t('app', 'Status'); ?></th>
            <th scope="col"><?= Yii::t('app', 'Sended date'); ?></th>
            <th scope="col"><?= Yii::t('app', 'Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>
            <tr>
                <th scope="col"><?=$i++; ?></th>
                <td><?= () ?></td>
            </tr>
    </tbody>
</table>