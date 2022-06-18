<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
		<title><?=!empty($meta_title)?$meta_title:'ISIC'; ?></title>
		<meta name="keywords" content="<?=!empty($meta_key)?$meta_key:''; ?>">
		<meta name="description" content="<?=!empty($meta_description)?$meta_description:''; ?>">
		<link rel="shortcut icon" type="image/png" href="<?=base_url('assets/img/favicon.png'); ?>">
        <!-- Links of CSS files -->
        <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?=base_url('assets/css/animate.min.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/owl.carousel.min.css'); ?>" />
        
        <link rel="stylesheet" href="<?=base_url('assets/css/meanmenu.min.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/nice-select.min.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/fancybox.min.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/odometer.min.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/magnific-popup.min.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/style.css'); ?>" />
		<link rel="stylesheet" href="<?=base_url('assets/css/style-new.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/responsive.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/custom.css'); ?>" />
        
        <link rel="stylesheet" href="<?=base_url('assets/css/boxicons.min.css'); ?>" />
		<link rel="stylesheet" href="<?=base_url('assets/css/flaticon.css'); ?>" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css" />
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    </head>
    <body data-url="<?=base_url();?>">        
        <div class="navbar-area navbar-color-white">
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="tel:1800 102 4742"><i class="bx bx-phone-call"></i> 1800 102 4742</a>
                            </li>
                            <li>
                                <button class="srchBtn" type="button" data-toggle="modal" data-target="#searchModal">
                                     <i class="flaticon-search"></i>
                                </button>
                            </li>
                            <li>
                                <a href="<?=getSetting('order_url'); ?>" target="_blank"><button class="btn btn-success bd">Get Your Card</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <div class="dibiz-responsive-nav">
                <div class="container-fluid">
                    <div class="dibiz-responsive-menu">
                        <div class="logo">
                            <a href="<?=base_url(); ?>">
                                <img src="<?=base_url('assets/img/logo.png'); ?>" alt="logo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dibiz-nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?=base_url(); ?>">
                            <img src="<?=base_url('assets/img/logo.png'); ?>" alt="logo" />
                        </a>

                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="<?=base_url('cards'); ?>" class="nav-link">Cards <i class="bx bx-chevron-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?=base_url('cards/isic'); ?>">ISIC</a></li>
                                        <li class="nav-item"><a href="<?=base_url('cards/iytc'); ?>">IYTC</a></li>
                                        <li class="nav-item"><a href="<?=base_url('cards/itic'); ?>">ITIC</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="<?=base_url('discounts'); ?>" class="nav-link">Discounts</a></li>
                                <li class="nav-item"><a href="<?=base_url('why-isic'); ?>" class="nav-link">Why ISIC?</a></li>
                                <li class="nav-item"><a href="<?=base_url('going-abroad'); ?>" class="nav-link">Going Abroad</a></li>
                                <!--li class="nav-item">
                                   <a href="<?=base_url('insurance/medical'); ?>" class="nav-link">Insurance <i class="bx bx-chevron-down"></i></a>
								   <a href="javascript:void(0);" class="nav-link">Insurance <i class="bx bx-chevron-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?=base_url('insurance/travel'); ?>">Travel Insurance</a></li>
                                        <li class="nav-item"><a href="<?=base_url('insurance/accidental'); ?>">Accidental Insurance</a></li>
                                    </ul>
                                </li-->
                                <li class="nav-item"><a href="<?=base_url('our-endorsements'); ?>" class="nav-link">Our Endorsements</a></li>
                                <li class="nav-item">
                                    <!--<a href="<?=base_url('partners/benefit'); ?>" class="nav-link">Partner With US <i class="bx bx-chevron-down"></i></a> -->
									<a href="javascript:void(0);" class="nav-link">Partner With Us <i class="bx bx-chevron-down"></i></a>
									
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?=base_url('partners/benefit-partner'); ?>">Benefit Partners</a></li>
                                        <!--li class="nav-item"><a href="<?=base_url('partners/academic-partner'); ?>">Academic Partners</a></li>
                                        <li class="nav-item"><a href="<?=base_url('partners/commercial-partner'); ?>">Commercial Partners</a></li-->
                                    </ul>
                                </li>
                                <?php
                                /*if(isLoggedIn())
                                {
                                    ?>
                                    <li class="nav-item">
    									<a href="javascript:void(0);" class="nav-link">Account <i class="bx bx-chevron-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="<?=base_url('my-account/dashboard'); ?>">Dashboard</a></li>
                                            <li class="nav-item"><a href="<?=base_url('logout'); ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <li class="nav-item">
    									<a href="javascript:void(0);" class="nav-link">Account <i class="bx bx-chevron-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="<?=base_url('login'); ?>">Login</a></li>
                                            <li class="nav-item"><a href="<?=base_url('register'); ?>">Register</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                }*/
                                ?>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <!-- End Search Overlay -->

       <!--Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?=base_url('search'); ?>" class="form-inline" method="GET">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control w-100" id="s" name="s" value="<?=$this->input->get('s'); ?>" placeholder="Search Enter Term">
                  </div>
                  <div class="form-group col-md-12 justify-content-center mt-4"><button type="submit" class="default-btn ch1 mb-2">Search Now</button></div>
                </form>
              </div>
              
            </div>
          </div>
</div>