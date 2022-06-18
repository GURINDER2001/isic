<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
    <div class="container-fluid">
        <div class="single-banner-item">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="banner-content">
                        <h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?> </span></h1>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="banner-image">
                        <img src="<?=base_url(!empty($pageContent->banner_img)?$pageContent->banner_img:'assets/img/card-2.jpg'); ?>" alt="<?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Banner Area -->

<section class="breadcrumbs12">
    <nav aria-label="Breadcrumbs">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a>
            </li>

            <li class="breadcrumbs__item1">
                <a href="#"><?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?></a>
            </li>
        </ul>
    </nav>
</section>

<section style="padding-top: 50px; padding-bottom: 50px;" class="about-area ptb-100 cards-iy">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 terms-use-div">
                <?php $segment = $this->uri->segment(1); ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?=(!empty($segment) && $segment == 'privacy-policy')?'active':''; ?>" href="<?=base_url('privacy-policy'); ?>">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=(!empty($segment) && $segment == 'terms-of-use')?'active':''; ?>" href="<?=base_url('terms-of-use'); ?>">Terms Of Use</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=(!empty($segment) && $segment == 'security')?'active':''; ?>" href="<?=base_url('security'); ?>">Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=(!empty($segment) && $segment == 'cancellation-and-shipping-policy')?'active':''; ?>" href="<?=base_url('cancellation-and-shipping-policy'); ?>">Cancellation and Shipping Policy</a>
                    </li>
                </ul>

                <!-- Tab panes -->
            </div>
        </div>
    </div>
</section>

<section class="accordion-sec">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane container active">
                <h3><?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?></h3>
                <?php
                if(!empty($pageContent))
                {
                  echo $pageContent->description;
                }
                else
                {
                  ?>
                  <div class="rec-heading">
                    <h3>404-Not Found</h3>
                  </div>
                  <p>Keyword which you want to search is not exists. Please change keyword and try again.</p> 
                  <?php
                }
                ?>  
            </div>
        </div>
    </div>
</section>
