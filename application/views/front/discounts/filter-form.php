<section class="filter-form">
	<div class="container">
		<form method="GET" action="<?=current_url(); ?>" >
			<div class="row">
				<div class="col-md-3">
					<h4><?=!empty($discount_section_instruction)?$discount_section_instruction:''; ?></h4>
				</div>
				<div class="col-md-2">
					<select class="form-control" id="type" name="type">
						<option value="dm" <?=($type == 'dm')?'selected="selected"':''; ?>>India</option>
						<option value="bm" <?=($type == 'bm')?'selected="selected"':''; ?>>Abroad</option>
					</select>
				</div>
                <div class="col-md-3">
					<input id="text" name="text" type="text" class="form-control" placeholder="Location" autocomplete="off" value="<?=!empty($text)?$text:''; ?>"/> 
					<input id="geo" name="geo" type="hidden" class="form-control" value="<?=!empty($geo)?$geo:''; ?>" <?=($type == 'dm')?'disabled="disabled"':''; ?>/> 
					<div id="suggesstion-box"></div>
				</div>
				<div class="col-md-2">
					<button type="submit" class="default-btn ch1">Filter</button>
				</div>
				</form>
				
				<div class="col-md-2">
					<select class="form-control" id="sortKey">
					    <option value="<?=urlWithQueryString('sortKey',''); ?>" <?=(empty($sortKey) || $sortKey == '')?'selected="selected"':''; ?>>Sort</option>
						<option value="<?=urlWithQueryString('sortKey','createdOn'); ?>" <?=(!empty($sortKey) && $sortKey == 'createdOn')?'selected="selected"':''; ?>>Newest</option>
						<option value="<?=urlWithQueryString('sortKey','name'); ?>" <?=(!empty($sortKey) && $sortKey == 'name')?'selected="selected"':''; ?>>Name</option>
						<option value="<?=urlWithQueryString('sortKey','views'); ?>" <?=(!empty($sortKey) && $sortKey == 'views')?'selected="selected"':''; ?>>Most Popular</option>
						<option value="<?=urlWithQueryString('sortKey','distance'); ?>" <?=(!empty($sortKey) && $sortKey == 'distance')?'selected="selected"':''; ?>>Distance</option>
					</select>
				</div>
			</div>
		
	</div>
</section>

<style>
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: absolute; z-index:999;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<script>
$(document).ready(function(){
    $(document).on('change','#sortKey',function(){
        var url = $(this).val();
        window.location.href = url;
    })
});
$(document).ready(function(){
    var base_url = $('body').attr('data-url');
	$("#text").keyup(function(){
	    var pattern = $(this).val();
	    var disType = $('#type option:selected').val();
	    if(disType == 'bm')
	    {
	        $.ajax({
        		type: "POST",
        		url: base_url+"discounts/suggestions",
        		data: {'pattern':pattern},
        		beforeSend: function(){
        			$("#text").css("background","#FFF url(<?=base_url('assets/img/LoaderIcon.gif'); ?>) no-repeat 250px");
        		},
        		success: function(response){
        			$("#suggesstion-box").show();
        			$("#suggesstion-box").html(response);
        			$("#text").css("background","#FFF");
        		}
    		});
	    }
	});
});

$(document).on('click','.geoItem',function(){
    var geoPath = $(this).attr('data-geoPath');
    var geoLoc = $(this).text();
    
    $('#geo').val(geoPath);
    $('#text').val(geoLoc);
    
    $("#suggesstion-box").hide();
});
</script>

<script>
    /*function initialize() {
      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);*/
</script>