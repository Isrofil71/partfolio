<?php
use dosamigos\chartjs\ChartJs;
use frontend\models\Report;
use bsadu\googlecharts\ColumnChart;



/**
 * 
 * @var $count \frontend\models\Report
 * @var $generalChart \frontend\models\Report
 */

 $this->title = "Starter Page";
 $this->params['breadcrumbs'] = [['label' => $this->title]];
 $region_list = (new \yii\db\Query())->select('nameUz')->from('region')->all();

?>
<div class="container-fluid">

    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Pie Chart</h3>
            
            <div class="card-tools">
                <button type ="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type ="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <?= \bsadnu\googlecharts\ColumnChart::widget([
                'id' => 'my-column-chart-id',
                'data' => $generalChart,
                'options' => [
                    'fontName' => 'Verdana',
                    'height' => 400,
                    'fontSize' => 12,
                    'chartArea' => [
                        'left' => '5%',
                        'width' => '90%',
                        'height' => 350
                    ],
                    'tooltip' => [
                        'textStyle' => [
                            'fontName' => 'Verdana',
                            'fontSize' => 13
                        ]
                    ],
                    'vAxis' => [
                        'title' => 'Sales and Expenses',
                        'titleTextStyle' => [
                            'fontSize' => 13,
                            'italic' => false
                        ],
                        'gridlines' => [
                            'color' => '#e5e5e5',
                            'count' => 10
                        ],            	
                        'minValue' => 0
                    ],
                    'legend' => [
                        'position' => 'top',
                        'alignment' => 'center',
                        'textStyle' => [
                            'fontSize' => 12
                        ]
                    ]            
                ]
            ]) ?>
        </div>
    </div>
</div>