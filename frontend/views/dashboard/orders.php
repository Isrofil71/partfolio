<?php
use common\models\VacancyOrders;
use yii\helpers\Html;

$name = 'name_' . Yii::$app->language;
$i = 1;

$this->title = Yii::t('app', 'Orders');;
?>
<table class="table table-striped">
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
    <?php foreach ($orders as $order): ?>
        <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= ($order->worker) ? $order->worker->firstname . ' ' . $order->worker->lastname : 'Aniqlanmadi' ?> <?= Html::a(Yii::t('app', 'Download CV'), ['dashboard/cv-download', 'id' => $order->worker_id]);?></td>
            <td><?= ($order->vacancy && $order->vacancy->profession) ? Html::a($order->vacancy->profession->$name, '/vacancy/single?id=' . $order->vacancy_id) : 'Aniqlanmadi' ?></td>
            <td><?= isset(VacancyOrders::STATUSLIST[$order->status]) ? Yii::t('app', VacancyOrders::STATUSLIST[$order->status]) : 'Topilmadi' ?></td>
            <td><?= $order->created_at ?></td>
            <td>
                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= Yii::t('app', 'Actions'); ?>
                    </button>
                    <div class="dropdown-menu">
                        <?= Html::a('Бекор қилиш', '/vacancy-orders/cancel?id=' . $order->id . '&action=1', ['class' => 'dropdown-item'])?>
                        <?= Html::a('Сухбатга чақириш', '/vacancy-orders/cancel?id=' . $order->id . '&action=2', ['class' => 'dropdown-item'])?>
                        <?= Html::a('Ишга чақириш', '/vacancy-orders/cancel?id=' . $order->id . '&action=3', ['class' => 'dropdown-item'])?>
                    </div>
                </div>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>