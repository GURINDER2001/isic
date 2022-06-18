<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
  <title><?=!empty($meta_title)?$meta_title:'Pro Education'; ?></title>
  <meta name="keywords" content="<?=!empty($meta_key)?$meta_key:''; ?>">
  <meta name="description" content="<?=!empty($meta_description)?$meta_description:''; ?>">

  <link rel="shortcut icon" href="<?=base_url('assets/front/images/favicon.png'); ?>">

  <link rel="stylesheet" href="<?=base_url('assets/front/css/bootstrap.min.css'); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />  
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="<?=base_url('assets/front/css/owl.carousel.min.css'); ?>" />
  <link rel="stylesheet" href="<?=base_url('assets/front/css/owl.theme.default.min.css'); ?>" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'); ?>"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js'); ?>"></script>
<![endif]-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/front/css/custom.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/front/css/dev-custom.css'); ?>" />
</head>

<body data-url="<?=base_url();?>">
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="top">
          <div class="col-md-4">
            <!-- Sidebar Holder -->
            <div class="navbar-header">
              <div id="sidebarCollapse" class="navbar-btn"> <a href="#"><i class="fa fa-bars"></i><span>Menu</span> </a> 
              </div>
            </div>
            <nav id="sidebar">
              <div id="dismiss"> <i class="glyphicon glyphicon-arrow-left"></i>
              </div>
              <ul class="list-unstyled components">
                <li> <a href="<?=base_url(); ?>">Home</a></li>
                <li> <a href="<?=base_url('about-us'); ?>">About Us</a></li>
                <li><a class="nav-link" href="<?=base_url('student-recruitment'); ?>">Student Recruitment</a></li>
                <li> <a href="<?=base_url('testimonials'); ?>">Testimonials</a></li>
                <li> <a href="<?=base_url('contact-us'); ?>">Contact</a></li>
              </ul>
            </nav>
            <nav id="header" class="navbar navbar-inverse">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>  <span class="icon-bar"></span>  <span class="icon-bar"></span>  <span class="icon-bar"></span> 
              </button>
              <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="<?=base_url('about-us'); ?>">About</a></li>                                    
                  <li class="nav-item"><a class="nav-link" href="<?=base_url('news'); ?>">News</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?=base_url('testimonials'); ?>">Testimonials</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?=base_url('contact-us'); ?>">Contact</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="col-md-4 text-center">
            <a id="brand" href="<?=base_url()?>">
              <img src="<?=base_url(!empty(get_setting('header_logo'))?get_setting('header_logo'):'assets/front/images/logo.png'); ?>" alt="">
            </a> 
          </div>
          <div class="col-md-4 right-side"> <span><?=!empty(get_setting('contact_number'))?get_setting('contact_number'):''; ?> </span>
            <a href="<?=base_url('book-a-demo'); ?>" class="book-btn">Book a demo</a>
          </div>
        </div>
      </div>
    </div>
  </header>