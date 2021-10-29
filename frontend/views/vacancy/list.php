<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="/jobboard/css/custom-bs.css">
    <link rel="stylesheet" href="/jobboard/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/jobboard/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/jobboard/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/jobboard/fonts/line-icons/style.css">
    <link rel="stylesheet" href="/jobboard/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/jobboard/css/animate.min.css">

    
    <link rel="stylesheet" href="/jobboard/css/style.css">    
  </head>
  <body id="top">

  <!-- <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div> -->
    

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> 
    
    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">22,392 Related Jobs</h2>
          </div>
        </div>
        
       
        <ul class="job-listings mb-5">
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="job-single.html"></a>
                <div class="job-listing-logo">
                    <img src="images/job_logo_1.jpg" alt="Image" class="img-fluid">
                </div>

                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                      
                        <strong><?= $vacancy->company_id ?></strong>
                    </div>
                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                        <span class="icon-room"></span> <?=$vacancy->region ? $vacancy->region->name_uz : null;?>
                    </div>
                    <div class="job-listing-meta">
                        <span class="badge badge-danger"><?=$vacancy->jobType ? $vacancy->jobType->name_uz : null;?></span>
                    </div>
                </div>
                
            </li>    
        </ul>
      </div>
    </section>
  </div>
        


    
    <script src="/jobboard/js/jquery.min.js"></script>
    <script src="/jobboard/js/bootstrap.bundle.min.js"></script>
    <script src="/jobboard/js/isotope.pkgd.min.js"></script>
    <script src="/jobboard/js/stickyfill.min.js"></script>
    <script src="/jobboard/js/jquery.fancybox.min.js"></script>
    <script src="/jobboard/js/jquery.easing.1.3.js"></script>
    
    <script src="/jobboard/js/jquery.waypoints.min.js"></script>
    <script src="/jobboard/js/jquery.animateNumber.min.js"></script>
    <script src="/jobboard/js/owl.carousel.min.js"></script>
    
    <script src="/jobboard/js/bootstrap-select.min.js"></script>
    
    <script src="/jobboard/js/custom.js"></script>

     
  </body>
</html>


