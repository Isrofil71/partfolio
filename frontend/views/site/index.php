
<?php

/* @var $this yii\web\View */

use common\widgets\VacancyWidget;
use kartik\select2\Select2;
use yii\bootstrap4\Carousel;
use yii\widgets\ActiveForm;

$this->title = 'Isrofil`s partfolio';
$name = 'name_' . Yii::$app->language;
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

<section class="home-section section-hero overlay bg-image" style="background-image: url('/jobboard/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
                </div>

                <?php $form = ActiveForm::begin([
                    'action' => ['/vacancy/list'],
                    'method' => 'get',
                    'options' => [
                        'data-pjax' => 1
                    ],
                ]); ?>
                    <div class="row mb-5">

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <?= $form->field($searchModel, 'company_id')->dropDownList([], ['prompt' => '---'])->label(false); ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <?= $form->field($searchModel, 'region_id')->widget(Select2::classname(), [
                                'data' => $region,
                                'size' => 'lg',
                                'language' => 'uz',
                                'options' => ['placeholder' => 'Select a region ...'],
                                'pluginOptions' => [
                                    'label' => false,
                                    'allowClear' => true
                                ],
                            ])->label(false);
                            ?>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <?= $form->field($searchModel, 'job_type_id')->widget(Select2::classname(), [
                                'data' => $job_type,
                                'size' => 'lg',
                                'language' => 'uz',
                                'options' => ['placeholder' => 'Select a job type ...'],
                                'pluginOptions' => [
                                    'label' => false,
                                    'allowClear' => true
                                ],
                            ])->label(false);
                            ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 popular-keywords">
                            <h3>Trending Keywords:</h3>
                            <ul class="keywords list-unstyled m-0 p-0">
                                <li><a href="/vacancy/list?VacancySearch%5Bprofession_id%5D=50" class="">Bugalter</a></li>
                                <li><a href="/vacancy/list?VacancySearch%5Bprofession_id%5D=51" class="">Dasturchi</a></li>
                                <li><a href="/vacancy/list?VacancySearch%5Bprofession_id%5D=53" class="">Web Dasturchi</a></li>
                            </ul>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>               
            </div>
        </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>
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


<section class="site-section" id="next">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">API <a href="http://api3.smartdesign.uz">Sardor aka </a> saytidan katta oylikli vakansiyalar</h2>
            </div>
        </div>
        <ul class="job-listings mb-5" id="vacansies_sardor"></ul>
        <p class="text-center"><a href="http://api1.smartdesign.uz/vacancy/list" class="btn btn-success text-white">Show more</a></p>
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
                    <strong class="number" data-number="<?= $statistics ? $statistics->vacancyes : 'Null' ?>"><?= $statistics->vacancyes ?></strong>
                </div>
                <span class="caption">Vacancyes</span>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $statistics ? $statistics->users : 'Null' ?>"><?= $statistics ? $statistics->users : 'Null' ?></strong>
                </div>
                <span class="caption">Users</span>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $statistics ? $statistics->workers : 'Null' ?>"><?= $statistics ? $statistics->workers : 'Null' ?></strong>
                </div>
                <span class="caption">Workers</span>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="<?= $statistics ? $statistics->companyes : 'Null' ?>"><?= $statistics ? $statistics->companyes : 'Null' ?></strong>
                </div>
                <span class="caption">Companies</span>
            </div>
        </div>
    </div>
</section>

<?= VacancyWidget::widget(['count' => 3]) ?>
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
        var data = <?= $results_map ?>;

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

<?php ob_start(); ?>

$(function(){
    $('#vacancysearch-company_id').select2({
        ajax: {
            url: '/ajax/company',
            data: function (params) {
                return {
                    q: params.term
                };
            },
            dataType: 'json'
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        },
        minimumInputLength: 3,
        formatInputTooShort: function(term, minLength){
            return "So`z uchta harfdan ko`p bo`lishi";
        },
        placeholder: 'Search',
        formatSearching: 'Қидириш...',
        formatNoMatches: 'Топилмади'
    });
});

<?php $script = ob_get_clean();
$this->registerJs($script);
?>

