<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;">Verification </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url('assets/img/card-1.jpg'); ?>" alt="image" />
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
				<a href="<?=base_url('cards'); ?>"> Card </a>
			</li>
			<li class="breadcrumbs__item1">
				<a href="#"> Verification</a>
			</li>
		</ul>
	</nav>
</section>

<section class="tabs-seation">
    <div class="tab-content">
        <?php echo getNotificationHtml();?>
        <div id="menu1" class="tab-pane fade in active">
            <div class="section-title">
                <h2>Serial Number Verification</h2>
            </div>
            <?php
            $personal_data = $this->session->userdata('personal_data');
            $personal_data_img = $this->session->userdata('personal_data_img');
            ?>
            <div class="container">
                <form class="form-pr" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center imgCol">
                            <div class="stickyy"><img src="<?=base_url('assets/img/card-front.png'); ?>" /></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                    <div class="form-group">
                                        <div><label>Have you Serial Number?</label></div>
                                        <div>
                                            <a id="have_serialnumber" href="javascript:;" class="btn btn-success"/> Yes, I have Serial Number. </a>
                                            <a id="havenot_serialnumber" href="<?=base_url('cards/selection'); ?>" class="btn btn-warning"/> No, I have't any.</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="haveSerialNumber" style="width:100%; display:none;">
                                    <div class="col-lg-9 col-md-9 col-sm-12 pull-left clearfix">
                                        <div class="form-group">
                                            <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Serial Number" required="required" value="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 text-center clearfix">
                                        <div class="card-btn back1">
                                            <button type="submit" class="default-btn ch2">Verify</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
       $(document).on('click','#have_serialnumber',function(){
           $('#haveSerialNumber').show();
       });
    });
</script>
    