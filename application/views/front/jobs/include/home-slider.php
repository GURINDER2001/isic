
<div class="mainslider">
  <div id="owl-demo" class="owl-carousel">
    <?php //print_r($slider_data); 
    if(!empty($slider_data)){ 
    foreach ($slider_data as $slider) { ?>
    <div>
    <img src="<?=base_url().$slider->featured_img?>">
      <div class="overlay"></div>
      <div class="caption text-right">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
              <div class="caption2">
                <h1><?=$slider->name?> </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } }?>
    
  </div>
  <div class="news2">
    <div class="col-xs-12 col-sm-2 nopad">
      <div class="latestnews">Latest News</div>
    </div>
    <div class="col-xs-12 col-sm-10 nopad">
      <div class="news1">
        <ul>
          <?php if(!empty($latest_news)) { foreach ($latest_news as $latestNews) { ?>          
          <li><a href="<?=base_url().'news/'.$latestNews->slug?>"><?=substr($latestNews->name,0,70).'...'?></a></li>
          <?php } } ?>
        </ul>
      </div>
    </div>
  </div>
</div>