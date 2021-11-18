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
<div id="container"></div>
<script>
// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [{
        "hc-key": "uz-qr",
        "value": 800,
        "resume_value": 528,
        "company_value": 2993,
        "vacancy_value": "1451"
    }, {
        "hc-key": "uz-bu",
        "value": 900,
        "resume_value": 418,
        "company_value": 3562,
        "vacancy_value": "4383"
    }, {
        "hc-key": "uz-sa",
        "value": 1000,
        "resume_value": 536,
        "company_value": 4211,
        "vacancy_value": "1767"
    }, {
        "hc-key": "uz-nw",
        "value": 1100,
        "resume_value": 329,
        "company_value": 2212,
        "vacancy_value": "634"
    }, {
        "hc-key": "uz-an",
        "value": 1200,
        "resume_value": 401,
        "company_value": 3866,
        "vacancy_value": "3162"
    }, {
        "hc-key": "uz-fa",
        "value": 1300,
        "resume_value": 438,
        "company_value": 4493,
        "vacancy_value": "3003"
    }, {
        "hc-key": "uz-su",
        "value": 1400,
        "resume_value": 292,
        "company_value": 4041,
        "vacancy_value": "3442"
    }, {
        "hc-key": "uz-si",
        "value": 1500,
        "resume_value": 230,
        "company_value": 1799,
        "vacancy_value": "1607"
    }, {
        "hc-key": "uz-kh",
        "value": 1600,
        "resume_value": 452,
        "company_value": 2769,
        "vacancy_value": "891"
    }, {
        "hc-key": "uz-ta",
        "value": 1700,
        "resume_value": 516,
        "company_value": 4947,
        "vacancy_value": "3208"
    }, {
        "hc-key": "uz-qa",
        "value": 1800,
        "resume_value": 720,
        "company_value": 4311,
        "vacancy_value": "3737"
    }, {
        "hc-key": "uz-ji",
        "value": 1900,
        "resume_value": 251,
        "company_value": 3944,
        "vacancy_value": "2157"
    }, {
        "hc-key": "uz-ng",
        "value": 2100,
        "resume_value": 451,
        "company_value": 3353,
        "vacancy_value": "1989"
    }, {
        "hc-key": "uz-tk",
        "value": 2200,
        "resume_value": 1323,
        "company_value": 10354,
        "vacancy_value": "11047"
    }];

// var data = [
//     ['uz-fa', 0],
//     ['uz-tk', 1],
//     ['uz-an', 2],
//     ['uz-ng', 3],
//     ['uz-ji', 4],
//     ['uz-si', 5],
//     ['uz-ta', 6],
//     ['uz-bu', 7],
//     ['uz-kh', 8],
//     ['uz-qr', 9],
//     ['uz-nw', 10],
//     ['uz-sa', 11],
//     ['uz-qa', 12],
//     ['uz-su', 13]
// ];

// Create the chart
Highcharts.mapChart('container', {
    chart: {
        map: 'countries/uz/uz-all'
    },

    title: {
        text: 'Vakansiyalar xariata ko`rinishida'
    },

    subtitle: {
        text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/uz/uz-all.js">Uzbekistan</a>'
    },

    mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0
    },

    series: [{
        data: data,
        name: 'Vakansiyalar soni',
        states: {
            hover: {
                color: '#BADA55'
            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }],
    
    tooltip: {
                headerFormat: '',
                backgroundColor: '#c1ff75',
                borderWidth: 3,
                shadow: false,
                useHTML: true,
                pointFormat: '<p><strong>{point.name}</strong></p><br><p>Иш берувчилар / Работодателей: <span>{point.company_value}</span></p><br><p>Бўш иш ўринлари / Вакансии: <span>{point.vacancy_value}</span></p><br><p>Резюмелар / Резюме: <span>{point.resume_value}</span></p>'
            }
});

</script>
