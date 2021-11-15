<?php
use common\models\VacancyOrders;

$name = 'name_' . Yii::$app->language;
$i = 1;
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Vacancy</th>
        <th scope="col">Company</th>
        <th scope="col">Status</th>
        <th scope="col">Sended date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($my_orders as $order): ?>
        <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= ($order->vacancy && $order->vacancy->profession) ? $order->vacancy->profession->$name : 'Aniqlanmadi' ?></td>
            <td><?= ($order->company) ? $order->company->name : 'Aniqlanmadi' ?></td>
            <td><?= isset(VacancyOrders::STATUSLIST[$order->status]) ? VacancyOrders::STATUSLIST[$order->status] : 'Topilmadi' ?></td>
            <td><?= $order->created_at ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>