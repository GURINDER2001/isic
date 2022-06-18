<!-- Start Footer Area -->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="single-footer-widget">
                            <h2>Get in Touch</h2>
                            <form id="subscriptionfrm" method="post">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <input type="email" id="subscriber_email" name="subscriber_email" placeholder="Enter your email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address" required="">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 text-right">
                                        <button class="btn btn-success"><i class="bx bx-right-arrow-alt"></i></button>
                                    </div>
                                    <div id="subscriptionmsg" class="col-lg-12 col-md-12 col-sm-12"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-footer-widget pl-5">
                            <h2>&nbsp;</h2>
                            <div class="customer-care">
                                <div class="row">
                                    <div class="col-3 col-lg-3">
                                        <i class="bx bx-phone-call"></i>
                                    </div>
                                    <div class="col-9 col-lg-9 col-md-9 col-sm-9">
                                        Customer Care:<br />
                                        <span>1800 102 4742</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="single-footer-widget pl-2 footer-last">
                            <div class="row">
                                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                                    <img src="<?=base_url('assets/img/bar.png'); ?>" />
                                </div>
                                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                                    <h3>Download App</h3>
                                    <img src="<?=base_url('assets/img/i1.png'); ?>" /><br />
                                    <img src="<?=base_url('assets/img/i2.png'); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-footer-widget footer-last">
                            <h3>Company</h3>

                            <ul class="footer-contact-info">
                                <li><a href="<?=base_url(); ?>">Home</a></li>
                                <li><a href="<?=base_url('about-us'); ?>">About Us</a></li>
                                <li><a href="<?=base_url('why-isic'); ?>">Why ISIC?</a></li>
                                <li><a href="<?=base_url('student-chatter'); ?>">Student Chatter</a></li>
                                <li><a href="<?=base_url('blog'); ?>">Blog</a></li>
                                <li><a href="<?=base_url('news'); ?>">News</a></li>
                                <li><a href="<?=base_url('login'); ?>">Login</a></li>
                                <li><a href="<?=base_url('register'); ?>">Register</a></li>
                                <li><a href="<?=base_url('faq'); ?>">FAQ's</a></li>
                                <li><a href="<?=base_url('refer-a-friend'); ?>">Refer a Friend</a></li>
                                <li><a href="<?=base_url('terms-of-use'); ?>">Terms of Use</a></li>
                                <li><a href="<?=base_url('contact-us'); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-footer-widget footer-last">
                            <h3>Partner:</h3>
                            <ul class="footer-contact-info">
                                <li><a href="<?=base_url('partners/benefit'); ?>">Benefit Partner</a></li>
                                <li><a href="<?=base_url('partners/academy'); ?>">Academic Partner</a></li>
                                <li><a href="<?=base_url('partners/commercial'); ?>">Commercial Partners</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-footer-widget footer-last">
                            <h3>Card:</h3>
                            <ul class="footer-contact-info">
                                <li><a href="<?=base_url('cards/isic'); ?>">Students Card</a></li>
                                <li><a href="<?=base_url('cards/itic'); ?>">Teachers Card</a></li>
                                <li><a href="<?=base_url('cards/iyic'); ?>">Youth Card</a></li>
                                <li><a href="<?=base_url('cards/selection'); ?>">Get Your Card</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <p>Copyright ©ISIC India. All Rights Reserved.</p>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <ul>
                                <li>
                                    <a href="<?=getSetting('facebook'); ?>" target="_blank"><i class="bx bxl-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="<?=getSetting('twitter'); ?>" target="_blank"><i class="bx bxl-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="<?=getSetting('instagram'); ?>" target="_blank"><i class="bx bxl-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="<?=getSetting('linkedin'); ?>" target="_blank"><i class="bx bxl-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->

        <div class="go-top"><i class="bx bx-up-arrow-alt"></i></div>
		<script>
            $(".bxslider").bxSlider({
                autoHover: true,
                auto: true,
                slideWidth: 250,
                minSlides: 2,
                maxSlides: 6,
                controls: true,
                pager: true,
                speed: 500,
                captions: true,
                slideMargin: 5,
            });
        </script>
        <!-- Links of JS files -->
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
        <script src="<?=base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/popper.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/appear.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/odometer.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/magnific-popup.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/fancybox.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/owl.carousel.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/meanmenu.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/nice-select.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/sticky-sidebar.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/wow.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/form-validator.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/contact-form-script.js'); ?>"></script>
        <script src="<?=base_url('assets/js/ajaxchimp.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/main.js'); ?>"></script>
        <script src="<?=base_url('assets/js/custom.js'); ?>"></script>
        
        
        <?php if($this->uri->uri_string() == ''){ ?>
        <!--script src="<?=base_url('assets/js/ScrollMagic.min.js'); ?>"></script>
        <script src="<?=base_url('assets/js/TweenMax.js'); ?>"></script>
        <script src="<?=base_url('assets/js/homescript.js'); ?>"></script-->
        <?php }?>
    </body>
</html>