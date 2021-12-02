<?php
$name = 'name_' . Yii::$app->language;
?>

<section class="site-section" id="next">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2"><?= $pagination->totalCount ?> Related Jobs</h2>
            </div>
        </div>
        <ul class="job-listings mb-5">

            <?php foreach ($vacancys as $item): ?>
                <?php $sheet[] = $item ?>

                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="/vacancy/single?id=<?= $item->id ?>"></a>
                    <div class="job-listing-logo">
                        <img src="<?= $item->image ? '/'.$item->image : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17cb871a4aa%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17cb871a4aa%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.390625%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' ?>" alt="Image" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><?= $item->profession ? $item->profession->$name : 'Kiritilmagan' ?></h2>
                            <strong><?= $item->company ? $item->company->name : 'Kiritilmagan' ?></strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span> <?= $item->address ? $item->address : 'Kiritilmagan' ?>
                        </div>
                        <div class="job-listing-meta">
                            <span class="badge badge-danger"><?= $item->jobType ? $item->jobType->$name : 'Kiritilmagan' ?></span>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>

        <p class="text-center"><a href="/vacancy/list" class="btn btn-success text-white">Show more</a></p>

    </div>
</section>
