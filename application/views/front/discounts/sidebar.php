<div class="sidebar-right">
<h6>Card Type</h6>
<ul class="cats">
    <li><a href="<?=urlWithQueryString('cardType','isic'); ?>" <?=(!empty($cardType) && $cardType == 'isic')?'class="active"':''; ?>>ISIC</a></li>
    <li><a href="<?=urlWithQueryString('cardType','iytc'); ?>" <?=(!empty($cardType) && $cardType == 'iytc')?'class="active"':''; ?>>IYTC</a></li>
    <li><a href="<?=urlWithQueryString('cardType','itic'); ?>" <?=(!empty($cardType) && $cardType == 'itic')?'class="active"':''; ?>>ITIC</a></li>
</ul>

<?php
if(!empty($categories))
{
    ?>
    <h6>Categories</h6>
    <ul class="cats">
        <?php
	    if($type == 'bm')
	    {
	        foreach($categories['items']['category'] as $category)
	        {
	            ?>
	            <li><a href="<?=urlWithQueryString('cat',$category['categoryId']); ?>" <?=(!empty($cat) && $cat == $category['categoryId'])?'class="active"':''; ?>><?=$category['name']; ?></a></li>
	            <?php
	        } 
	    }
	    else
	    {
	        foreach($categories->items as $category)
	        {
	            ?>
	            <li><a href="<?=urlWithQueryString('cat',$category->id); ?>" <?=(!empty($cat) && $cat == $category->id)?'class="active"':''; ?>><?=$category->name; ?></a></li>
	            <?php
	        }
	    }
	    ?>
    </ul>
	<?php
}
?>

<!--h6>Discount Type</h6>
<ul class="cats">
    <li><a href="<?=urlWithQueryString('online','true'); ?>" <?=(!empty($online) && $online == 'true')?'class="active"':''; ?>>Online</a></li>
    <li><a href="<?=urlWithQueryString('online','false'); ?>" <?=(!empty($online) && $online == 'false')?'class="active"':''; ?>>Offline</a></li>
</ul-->

</div>