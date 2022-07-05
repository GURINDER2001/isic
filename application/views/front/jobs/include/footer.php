<?php
$brands = getBrands();
if(!empty($brands))
{
    ?>
    <div class="container">
        <div class="row">
            <div class="brand">
                <div class="head-title-blk">OUR BRANDS</div>
                <div id="project-slider" class="owl-carousel">
                    <?php
                    foreach ($brands as $key => $brand)
                    {
                        ?>
                        <div class="item">
                          <div class="brand-pic">
                              <a href="<?=!empty($brand->domain)?'http://'.$brand->domain:''; ?>" target="_blank">
                                <img src="<?=base_url(!empty($brand->featured_img)?$brand->featured_img:'assets/front/images/logo-slider.jpg'); ?>" alt="" />
                              </a>
                          </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>



<section class="newsletter">
    <div class="container">
      <form id="subscriptionfrm" method="post">
        <div class="row">
            <div class="col-sm-4">
                <div class="news-block">
                    <p>Sign up to our newsletter</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="news-block">
                    <input type="text" id="subscriber_name" name="subscriber_name" class="form-control" placeholder="Your Name" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="news-block">
                    <input type="email" id="subscriber_email" name="subscriber_email" class="form-control" placeholder="Your Email..." pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="news-block">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </div>
        </div>
        <div id="subscriptionmsg"></div>
      </form>        
    </div>
</section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3"> 
          <span class="logo-bott">
            <a href="<?=base_url()?>">
              <img src="<?=base_url(!empty(get_setting('footer_logo'))?get_setting('footer_logo'):'assets/front/images/logo.png'); ?>" alt="">
            </a>
          </span>
          <p><?=!empty(get_setting('copyright'))?get_setting('copyright'):''; ?></p>
          <p style="color: #000;"><?=!empty(get_setting('powerby'))?get_setting('powerby'):''; ?></p>
        </div>
        <div class="col-lg-3">
          <h5>Contact Us</h5>
          <ul class="foot">
            <li><?=!empty(get_setting('contact_person'))?get_setting('contact_person'):''; ?></li>
            <li>
              <a href="<?=!empty(get_setting('contact_email'))?'mailto:'.get_setting('contact_email'):'javascript:;'; ?>">
                <?=!empty(get_setting('contact_email'))?get_setting('contact_email'):''; ?>                  
              </a>
            </li>
            <li>
              <a href="<?=!empty(get_setting('contact_number'))?'tel:'.get_setting('contact_email'):'javascript:;'; ?>">
                <?=!empty(get_setting('contact_number'))?get_setting('contact_number'):''; ?>                
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2">
          <h5>About Us</h5>
          <ul class="foot">
            <li><a href="<?=base_url('mission'); ?>">Mission</a></li>
            <li><a href="<?=base_url('vision'); ?>">Vission</a></li>
            <li><a href="<?=base_url('contact-us'); ?>">Contact Us </a></li>
            <li><a href="<?=base_url('book-a-demo'); ?>">Book a Demo</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
          <h5>Links</h5>
          <ul class="foot">
            <li><a href="<?=base_url('term-conditions'); ?>">Terms & Conditions</a></li>
            <li><a href="<?=base_url('sitemap'); ?>">Sitemap</a></li>
            <li><a href="<?=base_url('gdpr'); ?>">GDPR</a></li>
            <li><a href="<?=base_url('jobs'); ?>">Jobs</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
          <h5>FOLLOW US</h5>
          <div class="footer-social">

              <a href="<?=!empty(get_setting('facebook'))?get_setting('facebook'):''; ?>" target="_blank">
                <img src="<?=base_url('assets/front/images/foot01.jpg'); ?>" alt=""/>
              </a>
              <a href="<?=!empty(get_setting('twitter'))?get_setting('twitter'):''; ?>" target="_blank">
                <img src="<?=base_url('assets/front/images/foot02.jpg'); ?>" alt=""/>
              </a>
              <a href="<?=!empty(get_setting('rss'))?get_setting('rss'):''; ?>" target="_blank">
                <img src="<?=base_url('assets/front/images/foot03.jpg'); ?>" alt=""/>
              </a>
              
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!--script src="<?=base_url('assets/front/js/owl.carousel.js')?>"></script-->
  <script src="<?=base_url('assets/front/js/wow.min.js')?>"></script>
  <script src="<?=base_url('assets/front/js/honey-custom.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="<?=base_url('assets/front/js/custom.js')?>"></script>
</body>

</html>