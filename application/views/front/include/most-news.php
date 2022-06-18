<div class="mainVideo">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4">
      <h4 class="title2">Most Viewed Issues</h4>
      <?php if(!empty($most_views_issues)) {
        foreach ($most_views_issues as $mostIssues) { ?>
        <div class="videoBox">
        
          <figure>
            <?php if(!empty($mostIssues->video)) { $key=fatch_youtube_key($mostIssues->video); ?>
        <iframe width="100%" height="183" src="https://www.youtube.com/embed/<?=$key?>" frameborder="0" allowfullscreen></iframe>
                    <?php } else { ?>
                    <a href="<?=base_url('ideas/'.$mostIssues->slug) ?>">
                    <?php if(!empty($mostIssues->featured_img)) { ?>
                    <img src="<?=base_url('/timthumb.php?src='.$mostIssues->featured_img."&w=370&h=190");?>" class="img-responsive" />
                    <?php } else { ?>
                    <img src="<?=base_url('/timthumb.php?src=assets/front/images/no_topics.jpg&w=370&h=190')?>" class="img-responsive" />
                    <?php  }  ?>
                    </a>
                    <?php  }  ?>
          </figure>
          <div class="social2"> 
                  <span><i class="fa fa-eye" aria-hidden="true"></i>
                    <?=$mostIssues->views?></span>
          <span>Total Vote <?=getTotalIssues($mostIssues->id)?></span>
                    
                     </div>
          <div class="allDetail panel-body">
            <p><a href="<?=base_url('ideas/'.$mostIssues->slug) ?>"><?=$mostIssues->name?></a></p>
            <div class="like">
              <div class="like1"> <a href="<?=base_url('ideas/'.$mostIssues->slug) ?>">Vote Now </a></div>
              <div class="share">Share on : <?=socialShare(base_url($mostIssues->slug),base_url($mostIssues->featured_img),substr(strip_tags($mostIssues->description),0,255),$mostIssues->name) ?></div>
              
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
      <div class="col-xs-12 col-sm-4">
       <h4 class="title2">Most Liked Topic </h4>
       <?php if(!empty($most_like_topics)) {
        foreach ($most_like_topics as $mostTopics) { ?>
        <?php   $like=strip_tags(CheckTopicslikes($mostTopics->id)); ?>
        <div class="videoBox mainTopic <?php if($like!='Like') { echo 'push'; } ?>">     
          <figure><?php if(!empty($mostTopics->video)) { $key=fatch_youtube_key($mostTopics->video); ?>
        <iframe width="100%" height="183" src="https://www.youtube.com/embed/<?=$key?>" frameborder="0" allowfullscreen></iframe>
                    <?php } else { ?>
                    <a href="<?=base_url().'topics/'.$mostTopics->slug?>">
                    <?php if(!empty($mostTopics->featured_img)) { ?>
                    <img src="<?=base_url('/timthumb.php?src='.$mostTopics->featured_img."&w=370&h=190");?>" class="img-responsive" />
                    <?php } else { ?>
                    <img src="<?=base_url('/timthumb.php?src=assets/front/images/no_topics.jpg&w=370&h=190')?>" class="img-responsive" />
                    <?php  }  ?>
                    </a>
                    <?php  }  ?></figure>
           <div class="social2">
                    <!-- <div class="share pull-left">Share on : <?=socialShare(base_url($mostTopics->slug),base_url($mostTopics->featured_img),substr(strip_tags($mostTopics->description),0,255),$mostTopics->name) ?></div> -->
                    <span><i class="fa fa-eye" aria-hidden="true"></i>
                    <?=$mostTopics->views?></span> 
                    <span id="likecount"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <span like="<?=$mostTopics->total_likes?>"><?=getTotalTopicslikes($mostTopics->id); ?></span></span>
                    <span id="dislikecount"><i class="fa fa-thumbs-down" aria-hidden="true"></i>
                    <span like="<?=$mostTopics->total_likes?>"><?=getTotalTopicsDislikes($mostTopics->id); ?></span></span>
                    <span><i class="fa fa-comments" aria-hidden="true"></i>
                    <?=getTotalTopicsComments($mostTopics->id); ?>
                    </span>
                    </div>
          <div class="allDetail panel-body">
            <p class="aContent"><a href="<?=base_url('topics/'.$mostTopics->name) ?>"><?=$mostTopics->name ?></a></p>
            <div class="like">
              <div class="like1"><a href="javaScript:void(0);" postid="<?=$mostTopics->id?>">Like <i class="fa fa-thumbs-up" aria-hidden="true"></i> </a></div>
              <div class="dislike1"><a href="javaScript:void(0);" postid="<?=$mostTopics->id?>">Dislike <i class="fa fa-thumbs-down" aria-hidden="true"></i> </a></div>
              <div class="share">Share on : <?=socialShare(base_url($mostTopics->slug),base_url($mostTopics->featured_img),substr(strip_tags($mostTopics->description),0,255),$mostTopics->name) ?></div>
              
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
      <div class="col-xs-12 col-sm-4">
      <h4 class="title2">Most popular representative</h4>
        <div class="videoBox">
        <?php $mostfollowed = most_follow_user();
        //print_r($mostfollowed);
            if(!empty($mostfollowed)){
              $mostfollowedA = array_slice($mostfollowed,0,1);
            }else{
              $mostfollowedA[0] = array();
            }
            if(isset($mostfollowedA[0]['featured_img']) && !empty($mostfollowedA[0]['featured_img'])){
                    $imageurl = $mostfollowedA[0]['featured_img'];
                  }else{
                    $imageurl = 'assets/front/images/no_topics.jpg';
                  }
               
            ?>
        
          <figure><a href="<?=base_url('representatives/profile/'.base64_encode($mostfollowedA[0]['id']))?>"> <img src="<?=base_url('/timthumb.php?src='.$imageurl."&w=370&h=190")?>"/ class="img-responsive"></a></figure>
          <div class="social2"><span><i class="fa fa-eye" aria-hidden="true"></i>
                    <?=isset($mostfollowedA[0]['views'])?$mostfollowedA[0]['views']:""?></span><span><?=isset($mostfollowedA[0]['followercount'])?$mostfollowedA[0]['followercount']:"";?> Followers</span> </div>
          <div class="allDetail panel-body"> <a href="<?=base_url('representatives/profile/'.base64_encode($mostfollowedA[0]['id']))?>">
            <h3><?=isset($mostfollowedA[0]['name'])?$mostfollowedA[0]['name']:""?></h3>
            <p><?=substr(isset($mostfollowedA[0]['description'])?$mostfollowedA[0]['description']:"",0,50)?></p>
            </a>
            <div class="like">
            <div class="like1">
             <?php $loginuser = $this->session->userdata('userID');
                if(!empty($loginuser)){
                    if(isset($mostfollowedA[0]['id']) && $loginuser!=$mostfollowedA[0]['id']){
                        if(is_follow($mostfollowedA[0]['id'])){
                    ?>
                        <a  href="javascript:void(0);" class="followinguser" user-id ="<?=$mostfollowedA[0]['id'];?>">Following</a>
                        
                    <?php 
                        }else{
                            ?>
                            <a href="javascript:void(0);" class="followuser" user-id ="<?=$mostfollowedA[0]['id'];?>">Follow</a>
                           
                            <?php
                        }
                    }
                }else{
                    ?>
                    <a  data-toggle="modal" data-target="#loginModel" >Follow</a>
                       
                 <?php   } ?>
                 </div>
                 <div class="share">Share on : <?=socialShare(base_url('representatives/profile/'.base64_encode($mostfollowedA[0]['id'])),base_url($mostfollowedA[0]['featured_img']),substr(strip_tags($mostfollowedA[0]['description']),0,255),$mostfollowedA[0]['name']) ?></div>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

