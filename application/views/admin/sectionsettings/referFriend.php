<div class="content-wrapper">
	<section class="content-header">
	    <h1>Refer a Friend Settings<small>it all starts here</small></h1>
	    <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Section Setting</a></li>
	        <li class="active">Refer a Friend</li>
	    </ol>
	</section>
	<section class="content">
		<?php getNotificationHtml(); ?>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box">
					<?php
					if(!empty($collection)):
					foreach ( $collection as $data):
						$array[$data->name]=$data->value;
					endforeach;
					extract($array);
					endif;
					?>
	                <div class="box-body pad">
	                    <form method="post" enctype="multipart/form-data">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <div>
	                                    <h3>Banner Section</h3></div>
	                                <hr>
	                            </div>
	                        </div>

	                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner Images: </label>
                                </div>

                                <div class="form-group" id="blah_container">
                                    <img id="blah" src="<?=!empty($banner_img)?base_url($banner_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="banner_img" type="file" class="form-control pull-right" id="banner_img" onchange="checkPhoto(this)">
                                    </div>
                                </div>
                            </div>

	                        <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Page Content Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'heading', 'name' => 'heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('heading', !empty($heading)?$heading:''))); ?>
                                    </div>
                                    <?php echo form_error('heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('content', !empty($content)?$content:''); ?></textarea>
                                </div>
                                <?php echo form_error('content'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Infobox Content</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox Image</label>
                                </div>
                                <div class="form-group" id="blah2_container">
                                    <img id="blah2" src="<?=!empty($infobox_image)?base_url($infobox_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox_image" type="file" class="form-control pull-right" id="infobox_image" onchange="checkPhoto(this,'blah2')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="infobox_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox_content', !empty($infobox_content)?$infobox_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('infobox_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Infobox 2 Content</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox Image</label>
                                </div>
                                <div class="form-group" id="blah3_container">
                                    <img id="blah3" src="<?=!empty($infobox2_image)?base_url($infobox2_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox2 Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox2_image" type="file" class="form-control pull-right" id="infobox2_image" onchange="checkPhoto(this,'blah3')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="infobox2_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox2_content', !empty($infobox2_content)?$infobox2_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('infobox2_content'); ?>
                            </div>
                            

	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <div>
	                                    <h3>SEO Meta Section</h3></div>
	                                <hr>
	                            </div>
	                        </div>

	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label>Meta Title:</label>
	                                <div class="input-group date">
	                                    <div class="input-group-addon">
	                                        <i class="fa fa-file-text-o"></i>
	                                    </div>
	                                    <input name="meta_title" value="<?php echo set_value('meta_title', isset($meta_title)?$meta_title:" "); ?>" type="text" class="form-control pull-right" id="meta_title">
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label>Meta Key:</label>
	                                <div class="input-group date">
	                                    <div class="input-group-addon">
	                                        <i class="fa fa-file-text-o"></i>
	                                    </div>
	                                    <input name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right" id="meta_key">
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label>Meta Description:</label>
	                                <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
	                            </div>
	                        </div>

	                        <div class="clearfix"></div>
	                        <div class="col-md-12">
	                            <button type="submit" class="btn btn-primary">Submit</button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation

        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1

        var add_logo = $('#add_logo'); //Add button selector
        var logos_wrapper = $('#logos_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_logo).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row logosBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="partner_logo_icons">Icon:</label></div><div class="col-md-10"><input name="partner_logo_icons[]" type="file" class="form-control pull-right" id="partner_logo_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="partner_logo_title">Title:</label></div><div class="col-md-10"><input type="text" name="partner_logo_title[]" value="" id="partner_logo_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"><div class="col-md-2"><label for="partner_logo_title">Url:</label></div><div class="col-md-10"><input type="text" name="partner_logo_url[]" value="" id="partner_logo_title" class="form-control input-md" placeholder="Url..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(logos_wrapper).append(fieldHTMLSteps); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(logos_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

    });
</script>