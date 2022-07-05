<?php
//pre($pageContent);
if(!empty($pageContent))
{
    extract($pageContent);
}
?>
<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($name)?$name:''; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($featured_img)?$featured_img:'assets/img/in1.jpg'); ?>" alt="image" />
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
				<a href="#"><?=!empty($name)?$name:''; ?></a>
			</li>
		</ul>
	</nav>
</section>

<section class="blog-details-area bg-f9f9f9 ptb-100 insurance-1 trv">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-12">
						<div class="policy-form form-pr">
							<div class="what-we-do-content Policy12">
								<h2 class="tr1"><?=!empty($name)?$name:''; ?></h2>
								<!--h4 class="wht2">Policy Type <span class="wht1">What’s this?</span></h4-->
							</div>
							<form action="" method="post">
								<div class="row align-items-center">
								<!--div class="form-group">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
											<input type="radio" id="age1" name="age" value="30" />
											<label for="age1 ">Single Trip </label>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
											<input type="radio" id="age2" name="age" value="60" />
											<label for="age2">Annual Multi Trip </label>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
											<input type="radio" id="age3" name="age" value="100" />
											<label for="age3">Student</label>
										</div>
									</div-->
									<!--div class="form-group">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left">
											<label>Plan Type:</label>
											<select class="form-control" name="cars" id="cars">
												<option value="volvo"> Select plan type </option>
											</select>
										</div>
									</div-->
									
									<?php
									if(!empty($ResponseData))
									{ 
									    ?>
									    <table class="table text-white">
									            <thead>
									                <tr>
									                    <th>Plan Code</th>
									                    <th>Plan Name</th>
									                    <th>Plan Price</th>
									                    <th>&nbsp;</th>
									                </tr>
									            </thead>
									            <tbody>
            									    <?php
            									    foreach($ResponseData as $plan)
            									    {
            									        ?>
            									        <tr>
    									                    <td><?=$plan->planCode; ?></td>
    									                    <td><?=$plan->PlanName; ?></td>
    									                    <td><?=$plan->PlanPrice; ?></td>
    									                    <td><a href="" class="btn btn-success">Buy Insurance</a></td>
    									                </tr>
            									        <?php
            									    }
            									    ?>
    							            </tbody>
    							        </table>
    							        <?php
									}
									else
									{
									    ?>
									    <div class="form-group">
    										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
    											<label>Departure Date*:</label>
    											<input class="form-control" type="date" id="depart_date" name="depart_date" />
    										</div>
    
    										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
    											<label>Return Date*:</label>
    											<input class="form-control" type="date" id="return_date" name="return_date" />
    										</div>
    									</div>
    									
    									<div class="form-group">
    										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left">
    											<label>Date of Birth*</label>
    											<input class="form-control" type="date" id="birthday" name="birthday" />
    										</div>
    									</div>
    
    									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 -left">
    										<div class="card-btn back1">
    											<button type="submit" class="default-btn ch1">Get Plan</button>
    										</div>
    									</div>
									    <?php
									}
									?>
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-xs-12 trvTxt">
						<div class="form-text">
							<div class="content">
								<h2><?=!empty($name)?$name:''; ?></h2>
								<?=!empty($description)?$description:''; ?>
								
								<?php
								if(!empty($features))
								{
								    $featureArr = explode(",",$features);
								    
    								?>
    								<div class="widget-area products1">
    									<h4 class="oth1">Insurance Features include</h4>
    
    									<div class="tagcloud">
    									    <?php
    									    if(!empty($featureArr))
    									    {
    									        ?>
    									        <ul>
        									        <?php
        									        foreach($featureArr as $featureId)
        									        {
        									            $feature = getInsuranceFeature($featureId);
        									            ?>
        									            <li><?=$feature->name; ?></li>
        									            <?php
        									        }
        									        ?>
    									        </ul>
    									        <?php
    									    }
    									    ?>
    									</div>
    								</div>
    								<?php
								}
								?>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
