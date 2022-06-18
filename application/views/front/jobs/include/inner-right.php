<div class="col-xs-12 col-sm-5 col-md-4">
        <div class="main-left <?=isset($active_class)?$active_class:""; ?>">
          <div class="wants">
            <h4>Wants to Raise Issues?</h4>
            <a href="<?=base_url('ideas/create_ideas');?>">Write</a><img src="<?=base_url('assets/front/images/right-icon.png')?>"  class="pull-right"/> 
          </div>

          <?php if($this->uri->segment(1)==""){?>
          <div class="most-followd">
            <h5>Most Followed Representatives</h5>
            <?php $mostfollowed = most_follow_user();
            if(!empty($mostfollowed)){
              $mostfollowedA = array_slice($mostfollowed,0,9);
            }else{
              $mostfollowedA = array();
            }
            ?>
            <ul>
            <?php if(!empty($mostfollowedA)){
                foreach($mostfollowedA as $key=>$val){
                  if(!empty($val['featured_img'])){
                    $imageurl = $val['featured_img'];
                  }else{
                    $imageurl = 'assets/front/images/no_image.gif';
                  }
                  
                  ?>

              <li>
                <figure><a href="<?=base_url('representatives/profile/'.base64_encode($val['id']));?>"><img src="<?=base_url('/timthumb.php?src='.$imageurl."&w=55&h=55")?>" class="img-circle" /></a></figure>
                <?php $loginuser = $this->session->userdata('userID');
                if(!empty($loginuser)){
                    if($loginuser!=$val['id']){
                        if(is_follow($val['id'])){
                    ?>
                        <a  href="javascript:void(0);" class="followinguser" user-id ="<?=$val['id'];?>">Following</a>
                        
                    <?php 
                        }else{
                            ?>
                            <a href="javascript:void(0);" class="followuser" user-id ="<?=$val['id'];?>">Follow</a>
                           
                            <?php
                        }
                    }
                }else{
                    ?>
                    <a  data-toggle="modal" data-target="#loginModel" >Follow</a>
                       
                 <?php   } ?>
              </li>
              <?php }
              }else{
                ?>
                <div class="alert alert-info">No result Found</div>
                <?php
              }
              ?>

             
            </ul>
          </div>
         <!--  <div class="sharePolls">
            <h5>Followe us</h5>
            <ul>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              
            </ul>
          </div> -->

            <div class="latestIssue">
            <h5>Latest Issues</h5>
            <?php if(!empty($latest_issues)) {
            foreach ($latest_issues as $issues) { ?>
            <div class="media">
              <div class="media-left">
              <?php
            if(!empty($issues->featured_img)){ ?>
            <img src="<?=base_url($issues->featured_img)?>" class="img-responsive" />
            <?php }else{ ?>
            <img src="<?=base_url('assets/front/images/no_image.gif')?>" class="img-responsive" />
            <?php } ?>
              </div>
              <div class="media-body">
                <p><?=$issues->name?></p>
                <a href="#">Fashion</a> <a href="#"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1 Hour Ago</a> </div>
            </div>
            <hr />
            <?php } } ?>
            
            
          </div>
          <div class="latestNews">
            <h5>Latest News</h5>
            <?php if(!empty($latest_news)) {
            foreach ($latest_news as $homeNews) { ?>
            <div class="news1">
              <a href="<?=base_url('news/'.$homeNews->slug)?>">
                
                <?php
          if(!empty($homeNews->featured_img)){ ?>
            <figure><img src="<?=base_url($homeNews->featured_img)?>" class="img-responsive" /></figure>
            <?php }else{ ?>
            <img src="<?=base_url('assets/front/images/list-news.jpg')?>" class="img-responsive" />
            <?php } ?>
              </a>
              <div class="date2 pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <?php $date=strtotime($homeNews->created); echo date("d F Y", $date);?></div>
              <h6><a href="<?=base_url('news/'.$homeNews->slug)?>"><?=$homeNews->name?></a></h6>
              <p><?php echo (strlen(strip_tags($homeNews->description)) > 100)?substr(strip_tags($homeNews->description),0,200).'....':substr(strip_tags($homeNews->description),0,100); ?></p>
            </div>
                      
          <?php } } ?>
          </div>
          <?php } ?>



          <div class="otherLinks">
          <h5>Other links</h5>
          <ul>
             <?php if($this->uri->segment(1)!="topics"){?><li><a href="<?=base_url('topics')?>">Topics</a></li><?php } ?>
             <?php if($this->uri->segment(1)!="ideas"){?><li><a href="<?=base_url('ideas')?>">Idea</a></li><?php } ?>
             <?php if($this->uri->segment(1)!="news"){?><li><a href="<?=base_url('news')?>">News</a></li><?php } ?>
             <?php if($this->uri->segment(1)!="polls"){?><li><a href="<?=base_url('polls')?>">Polls</a></li><?php } ?>
             <?php if($this->uri->segment(1)!="representatives"){?><li><a href="<?=base_url('representatives')?>">Representatives</a></li><?php } ?>
          </ul>
          </div>
          <?php if($this->uri->segment(1)!=""){?>
          <!-- <div class="sharePolls">
            <h5>share <?=ucfirst($this->uri->segment(1));?></h5>
            <ul>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
          </div> -->
          
          <div class="otherPolls">
          
            <h5>Other <?=ucfirst($this->uri->segment(1));?></h5>
            <ul class="newsList">
           <?php if(!empty($sidebar_right)){
                foreach ($sidebar_right as $key => $value) {
                   ?>
                   <li><a href="<?=base_url($this->uri->segment(1).'/'.$value->slug)?>"><?php echo $value->name;?></a></li>
                   <?php
                 } 
              } else { ?>
           <li>No Record.</li>
           <?php } ?>
           <!-- <li class="text-center"><a href="#">View All</a></li> -->
           </ul>
          </div>
          <?php } ?> 
        </div>
      </div>