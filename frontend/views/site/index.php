<?php

/* @var $this yii\web\View */

$this->title = 'Isrofil`s partfolio';
?>

<style>
    #container {
    height: 500px;
    min-width: 310px;
    max-width: 800px;
    margin: 0 auto;
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}
</style>
<section class="site-section py-4">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-12 text-center mt-4 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <h2 class="section-title mb-2">Company We've Helped</h2>
                        <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>
                    </div>
                </div>

            </div>
            <?php foreach ($partners as $item): ?>

                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="<?= $item->logo ?>" alt="Image" class="img-fluid" style="max-width: <?= $item->maxwidth ?>px">
                </div>

            <?php endforeach ?>
        </div>
    </div>
</section>


<!-- STATISTICS -->
<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image:url(images/xhero_1.jpg.pagespeed.ic.V0QtS-940g.webp)">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
                <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="1930"><?= $statistics->vacancyes ?></strong>
                </div>
                <span class="caption">Vacancyes</span>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="54"><?= $statistics->users ?></strong>
                </div>
                <span class="caption">Users</span>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="120"><?= $statistics->workers ?></strong>
                </div>
                <span class="caption">Workers</span>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="550"><?= $statistics->companyes ?></strong>
                </div>
                <span class="caption">Companies</span>
            </div>
        </div>
    </div>
</section>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script>
<!-- <div id="container"></div> -->
<section>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script>

    <div id="statistic-map"></div>

    <script>
        var data = <?= $result_maps ?>;
        
        // Create the chart
        Highcharts.mapChart('statistic-map', {
            chart: {
                map: 'countries/uz/uz-all'
            },

            title: {
                text: ''
            },

            subtitle: {
                text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/uz/uz-all.js">Uzbekistan</a>'
            },

            mapNavigation: {
                enabled: false,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            colorAxis: {
                min: 0
            },

            series: [{
                data: data,
                mapData: Highcharts.maps['countries/uz/uz-all'],
                joinBy: 'hc-key',
                name: 'Uzbekistan Respublikasi',
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                },
                tooltip: {
                    headerFormat: '',
                    backgroundColor: null,
                    borderWidth: 0,
                    shadow: false,
                    useHTML: true,
                    pointFormat: '<p><strong>{point.name}</strong></p><br><p>Иш берувчилар / Работодателей: <span>{point.company_value}</span></p><br><p>Бўш иш ўринлари / Вакансии: <span>{point.vacancy_value}</span></p><br><p>Резюмелар / Резюме: <span>{point.resume_value}</span></p>'
                }
            }]
        });
    </script>
</section>
