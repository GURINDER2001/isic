var base_url = $('body').attr('data-url');

$('#datepicker').datepicker({

	autoclose: true,

	showButtonPanel: true,

	format: 'yyyy-mm-dd'

});

$('.datepicker').datepicker({

	autoclose: true,

	showButtonPanel: true,

	format: 'yyyy-mm-dd'

});


var modal = document.getElementById('jlightbox');
//var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
jQuery('.myImg').on('click', function() {
    modal.style.display = "block";
    modalImg.src = this.src;
});

var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}

$(function () { $(".textarea").wysihtml5(); });

$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
checkboxClass: 'icheckbox_flat-green',
radioClass: 'iradio_flat-green'
});



var _URL = window.URL || window.webkitURL;
jQuery("#featured_img").change(function (e)
{
	var file, img;
	if ((file = this.files[0]))
	{
		img = new Image();
		img.onload = function () { };
		img.src = _URL.createObjectURL(file); 
	}
});

function checkPhoto(target,id='blah')
{
	if(target.files[0].type.indexOf("image") == -1)
	{
		jQuery('#'+id).attr('src', '#'); 
		return false;
	}
	if (target.files && target.files[0])
	{
		var reader = new FileReader();
		reader.onload = function (e)
		{
			jQuery('#'+id).attr('src', e.target.result);
			jQuery('#'+id+'_container').css('display','block'); 
		}
		reader.readAsDataURL(target.files[0]);
	}
}

var _URL = window.URL || window.webkitURL;

jQuery("#banner_img").change(function (e) {

var file, img;

if ((file = this.files[0])) {

img = new Image();

img.onload = function () { };        

img.src = _URL.createObjectURL(file); 

}

});



function checkBanner(target)
{
	if(target.files[0].type.indexOf("image") == -1)
	{
		jQuery('#banner').attr('src', '#'); 
		return false;
	}
	if (target.files && target.files[0])
	{
		var reader = new FileReader();
		reader.onload = function (e)
		{
			jQuery('#banner').attr('src', e.target.result);
			jQuery('#banner_container').css('display','block'); 
		}
		reader.readAsDataURL(target.files[0]);
	}
}

jQuery('#country').on('change', function() {
	var country_id=jQuery(this).find(":selected").val();
	jQuery("#state").find('option:selected').prop("selected", false);
	jQuery("#city").find('option:selected').prop("selected", false);
	var dataString = 'country_id='+country_id;
	jQuery.ajax({
		type: "POST",
		url: base_url+"admin/ajaxdata",
		data: dataString,
		cache: false,
		success: function(result){
			jQuery('#state').html(result);
		}
	});
});


$(document).on('change','.country',function (e) {
    e.preventDefault();
    var destination_field = '#state_' + $(this).attr('data-index');
    var country_id = $(this).val();
    $.ajax({
      type: 'post',
      url: $('body').attr("data-url")+'ajax-states',
      data: { 'country_id': country_id },
      success: function (data) {
        $(destination_field).html(data); 
      }
    });
    return false;
});

$(document).on('change','.state',function (e) {
    e.preventDefault();
    var destination_field = '#city_' + $(this).attr('data-index');
    var state_id = $(this).val();
    $.ajax({
      type: 'post',
      url: $('body').attr("data-url")+'ajax-city',
      data: { 'state_id': state_id },
      success: function (data) {
        $(destination_field).html(data); 
      }
    });
    return false;
});


jQuery('#state').on('change', function() { 
	jQuery('#city').empty();
	var state_id=jQuery(this).find(":selected").val();
	jQuery("#city").find('option:selected').prop("selected", false);
	var dataString = 'state_id='+state_id;
	jQuery.ajax({
		type: "POST",
		url: base_url+"admin/ajaxdata", 
		data: dataString,
		cache: false,
		success: function(result){
			jQuery('#city').html(result) ;      
		}
	});
});

jQuery('#college_campus_filter').on('change', function() { 
	var base_url = jQuery('#college_campus_filter').attr('data-base');
	var id = jQuery(this).val();
	window.location.replace(base_url+'/'+id);
});

$('#brand_switcher').change(function(){
	var brand = $(this).val();
	jQuery.ajax({
		type: "POST",
		url: base_url+"admin/brands/swichbrand", 
		data: {'brand_id':brand},
		success: function(result){
			location.reload();
		}
	});
});

jQuery(document).on('click','#addcopy', function(){
	var clone = jQuery('#copyfrom').clone();
	clone.find(".text-danger").remove();
	clone.appendTo("#copyto").find("input:text").val('');
});

jQuery(document).on('click','#removecopy', function() {
	jQuery(this).closest('#copyfrom').remove();
});

jQuery(document).on('click','#validans', function(){
	if (jQuery(this).is(':checked'))
	{
	    jQuery(this).siblings('#valid_ans').val('1');
	}
	else
	{
	     jQuery(this).siblings('#valid_ans').val('0');
	}
});

/*var inputLocalFont = document.getElementById("image-input");
inputLocalFont.addEventListener("change",previewImages,false);
function previewImages()
{
	var fileList = this.files;
	var anyWindow = window.URL || window.webkitURL;
	for(var i = 0; i < fileList.length; i++)
	{
		delete fileList[0];
		var objectUrl = anyWindow.createObjectURL(fileList[i]);
		$('.preview-area').append('<img style="width:100px;height:100px;border: 1px solid #ccc; padding: 10px; margin-bottom:10px; margin-right:10px" src="' + objectUrl + '" />');
		window.URL.revokeObjectURL(fileList[i]);
	} 
}*/

function DelDocuments(obj,id)
{
	obj.closest('div').remove();
	var dataString = 'id='+id;
	jQuery.ajax({
	type: "POST",
	url: base_url+"admin/ajaxdata", 
	data: dataString,
	cache: false,
	success: function(result){
			var result=trim(result);             
			if(result){
			alert('ddddd');
			}
		}
	});
}

$(document).ready(function() {
	$('.campus-dateoption, .campus-location-visibility').change(function(){
        var date_type = $('.campus-dateoption:checked').val();
        var date_visibility = $('.campus-location-visibility:checked').val();

        if(date_type == 'open')
        {
            $('#specific-dates-boxes').hide();
            $('#auto-dates-boxes').hide();
        }
        else if(date_type == 'automatic' && date_visibility == 'yes')
        {
            $('#specific-dates-boxes').hide();
            $('#auto-dates-boxes').show();
        }
        else if(date_type == 'specific' && date_visibility == 'yes')
        {
            $('#specific-dates-boxes').show();
            $('#auto-dates-boxes').hide();
        }
        else
        {
            $('#specific-dates-boxes').hide();
            $('#auto-dates-boxes').hide();
        }
     });

	$('#program_associted_brands').on('change', function() {
        var ajax_url = $('body').attr('data-url');
        var brandArr = $(this).val();

        for (index = 0; index < brandArr.length; index++)
        { 
            var brand_id = brandArr[index];
            var catbox_id = '#program_category_'+brand_id;
            if( $(catbox_id).length == 0 )
            {
                jQuery.ajax({
                    url: ajax_url+'admin/programs/ajaxFindCategory',
                    type: "POST",
                    data: {'brand_id' : brand_id},
                    success: function(response)
                    {
                        $('#cat_program_containers').append(response);
                        $('.select2').select2();
                    }
                }); 
            }
        }
    });
});