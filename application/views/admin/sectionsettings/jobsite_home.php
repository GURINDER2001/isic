<div class="content-wrapper">
	<section class="content-header">
	    <h1>JobSite Homepage Settings<small>it all starts here</small></h1>
	    <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Section Setting</a></li>
	        <li class="active">Job Site Homepage</li>
	    </ol>
	</section>
	<section class="content">
		<?php getNotificationHtml(); ?>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box">
					<?php
                    //pre($collection);
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
                                        <h3>Page Contents Section</h3></div>
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
                                    <div>
                                        <h3>Info Box Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="field_wrapper" id="info_wrapper">
                                    <?php
                                    $infobox_data = !empty($infobox_data)?unserialize($infobox_data):array();
                                    if(!empty($infobox_data))
                                    {
                                        $k=1;
                                        foreach ($infobox_data as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row infoBox">
                                                        <div class="col-md-12">
                                                            <div class="row form-group">
                                                                <div class="col-md-2"><label for="infobox_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'infobox_title', 'name' => 'infobox_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2"><label for="infobox_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'infobox_content', 'name' => 'infobox_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_info" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_info" class="remove_button" title="Remove field">
                                                            <img src="<?=base_url('assets/admin/images/delete.png');?>"/>
                                                        </a>                                                               
                                                        <?php
                                                    }
                                                    ?>                                                            
                                                </div>
                                            </div>
                                           <?php
                                           $k++;
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row infoBox">
                                                        <div class="col-md-12">                                                            
                                                            <div class="row form-group">
                                                                <div class="col-md-2"><label for="infobox_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'infobox_title', 'name' => 'infobox_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2"><label for="infobox_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'infobox_content', 'name' => 'infobox_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_info" class="add_button" title="Add field">
                                                        <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                    </a>
                                                </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Job Section</h3></div>
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
                                        <?php echo form_input(array('id' => 'job_heading', 'name' => 'job_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('job_heading', !empty($job_heading)?$job_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('job_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'job_subheading', 'name' => 'job_subheading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('job_subheading', !empty($job_subheading)?$job_subheading:''))); ?>
                                    </div>
                                    <?php echo form_error('job_subheading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Poster Image: </label>
                                </div>

                                <div class="form-group" id="blah7_container">
                                    <img id="blah7" src="<?=!empty($job_poster)?base_url($job_poster):base_url('assets/admin/images/no_image.gif'); ?>" alt="Job Poster" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="job_poster" type="file" class="form-control pull-right" id="job_poster" onchange="checkPhoto(this,'blah7')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Gallery Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="field_wrapper row" id="gallery_wrapper">
                                    <?php
                                    $gallery_image = !empty($gallery_image)?unserialize($gallery_image):array();
                                    if(!empty($gallery_image))
                                    {
                                        $k=1;
                                        foreach ($gallery_image as $rec)
                                        {
                                           ?>
                                            <div class="col-md-6">
                                                <div class="row sectionBox">
                                                    <div class="col-md-3">
                                                        <div id="blah6<?=$k; ?>_container">
                                                            <img class="img1" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                            <input type="hidden" id="gallery_image_edit" name="gallery_image_edit[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input name="gallery_image[]" type="file" class="form-control pull-right" id="gallery_image" onchange="checkPhoto(this,'blah6<?=$k; ?>')">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="remove_steps" class="remove_button" title="Remove field">
                                                            <img src="<?=base_url('assets/admin/images/delete.png');?>"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                           <?php
                                           $k++;
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="col-md-6">
                                                <div class="row sectionBox">
                                                    <div class="col-md-3">
                                                        <div id="blah6_container">
                                                            <img class="img1" id="blah6" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input name="gallery_image[]" type="file" class="form-control pull-right" id="gallery_image" onchange="checkPhoto(this,'blah6')">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="remove_gallery" class="remove_button" title="Remove field">
                                                            <img src="<?=base_url('assets/admin/images/delete.png');?>"/>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <a href="javascript:void(0);" id="add_gallery" class="add_button" title="Add field">
                                    <img src="<?=base_url('/assets/admin/images/add.png'); ?>"> Add New Image
                                </a>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Contact Section</h3></div>
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
                                        <?php echo form_input(array('id' => 'contact_heading', 'name' => 'contact_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('contact_heading', !empty($contact_heading)?$contact_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'contact_address_heading', 'name' => 'contact_address_heading','class'=>'form-control input-md','placeholder'=>'Address Heading..','value' => set_value('contact_address_heading', !empty($contact_address_heading)?$contact_address_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_address_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea id="contact_address" name="contact_address" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('contact_address', isset($contact_address)?$contact_address:""); ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Google Map Embedded Url</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'contact_googlemap_url', 'name' => 'contact_googlemap_url','class'=>'form-control input-md','placeholder'=>'Address Heading..','value' => set_value('contact_googlemap_url', !empty($contact_googlemap_url)?$contact_googlemap_url:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_googlemap_url'); ?>
                                </div>
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


        var add_info = $('#add_info'); //Add button selector
        var info_wrapper = $('#info_wrapper'); //Input field wrapper

        //Once add button is clicked
        $(add_info).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var fieldHTMLInfo = '<div class="row"> <div class="col-md-11"> <div class="row infoBox"><div class="col-md-12"><div class="row form-group"> <div class="col-md-2"><label for="key_elements_title">Title:</label></div><div class="col-md-10"><input type="text" name="infobox_title[]" value="" id="infobox_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row form-group"> <div class="col-md-2"><label for="infobox_content">Content:</label></div><div class="col-md-10"><textarea name="infobox_content[]" rows="3" id="infobox_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_info" class="remove_button" title="Remove field"> <img src="/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(info_wrapper).append(fieldHTMLInfo); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(info_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

        var add_gallery = $('#add_gallery'); //Add button selector
        var gallery_wrapper = $('#gallery_wrapper'); //Input field wrapper

        //Once add button is clicked
        $(add_gallery).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah6a'+y;
                var fieldHTMLGallery = '<div class="col-md-6"><div class="row sectionBox"><div class="col-md-3"><div id="blah6_container"><img class="img1" id="'+blah+'" src="/assets/admin/images/no_image.gif" alt="your image" /></div></div><div class="col-md-8"><input name="gallery_image[]" type="file" class="form-control pull-right" id="gallery_image" onchange="checkPhoto(this,\''+blah+'\')"></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_gallery" class="remove_button" title="Remove field"><img src="/assets/admin/images/delete.png"/></a></div></div></div>';
                y++; //Increment field counter
                $(gallery_wrapper).append(fieldHTMLGallery); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(gallery_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

    });
</script>