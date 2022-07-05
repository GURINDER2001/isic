<div class="content-wrapper">
	<section class="content-header">
	    <h1>Endorsements Settings<small>it all starts here</small></h1>
	    <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Section Setting</a></li>
	        <li class="active">Endorsements</li>
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
                                        <h3>Key Info Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>KeyInfo Section Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'keyinfo_heading', 'name' => 'keyinfo_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('keyinfo_heading', !empty($keyinfo_heading)?$keyinfo_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('keyinfo_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Key Elements</label>
                                </div>
                                <div class="field_wrapper" id="steps_wrapper">
                                    <?php
                                    $keyinfo_content = !empty($keyinfo_content)?unserialize($keyinfo_content):array();
                                    if(!empty($keyinfo_content))
                                    {
                                        $k=1;
                                        foreach ($keyinfo_content as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah5<?=$k; ?>_container">
                                                                <img class="img2" id="blah5<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_elements_image" name="key_elements_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                                <input type="hidden" id="key_elements_pdf" name="key_elements_pdf[]" value="<?=!empty($rec['pdf'])?$rec['pdf']:'';?>">
                                                            </div>
                                                            <div id="blah6<?=$k; ?>_container">
                                                                <img class="img1" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['logo'])?$rec['logo']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_elements_logoimg" name="key_elements_logoimg[]" value="<?=!empty($rec['logo'])?$rec['logo']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">PDF Screenshot:</label></div>
                                                                <div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_pdfs">PDF:</label></div>
                                                                <div class="col-md-10">
                                                                    <input name="key_elements_pdfs[]" type="file" class="form-control pull-right" id="key_elements_pdfs">
                                                                    <?php if(!empty($rec['pdf'])) { ?> <a href="<?=base_url($rec['pdf']); ?>" target="blank">View PDF</a> <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">Logo:</label></div>
                                                                <div class="col-md-10"><input name="key_elements_logos[]" type="file" class="form-control pull-right" id="key_elements_logos" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_steps" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_steps" class="remove_button" title="Remove field">
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
                                                    <div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah5_container">
                                                                <img class="img2" id="blah5" src="<?=base_url(!empty($steps_icon)?$steps_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_elements_image" name="key_elements_image[]">
                                                                <input type="hidden" id="key_elements_pdf" name="key_elements_pdf[]">
                                                            </div>
                                                            <div id="blah6<?=$k; ?>_container">
                                                                <img class="img1" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['logo'])?$rec['logo']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_elements_logoimg" name="key_elements_logoimg[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">PDF Screenshot:</label></div>
                                                                <div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,'blah5')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_pdfs">PDF:</label></div>
                                                                <div class="col-md-10">
                                                                    <input name="key_elements_pdfs[]" type="file" class="form-control pull-right" id="key_elements_pdfs">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">Logo:</label></div>
                                                                <div class="col-md-10"><input name="key_elements_logos[]" type="file" class="form-control pull-right" id="key_elements_logos" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_steps" class="add_button" title="Add field">
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
                                        <h3>Partners Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Partner Section Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'partner_heading', 'name' => 'partner_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('partner_heading', !empty($partner_heading)?$partner_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('partner_heading'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logo</label>
                                </div>
                                <div class="field_wrapper" id="logos_wrapper">
                                    <?php
                                    $partner_logos = !empty($partner_logos)?unserialize($partner_logos):array();
                                    if(!empty($partner_logos))
                                    {
                                        $k=1;
                                        foreach ($partner_logos as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah15<?=$k; ?>_container">
                                                                <img class="img2" id="blah15<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="partner_logo_iconimage" name="partner_logo_iconimage[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                                <input type="hidden" id="partner_logo_pdf" name="partner_logo_pdf[]" value="<?=!empty($rec['pdf'])?$rec['pdf']:'';?>">
                                                            </div>
                                                            <div id="blah16<?=$k; ?>_container">
                                                                <img class="img1" id="blah16<?=$k; ?>" src="<?=base_url(!empty($rec['logo'])?$rec['logo']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="partner_logo_logoimage" name="partner_logo_logoimage[]" value="<?=!empty($rec['logo'])?$rec['logo']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="key_elements_icons">PDF Screenshot:</label></div>
                                                                <div class="col-md-10"><input name="partner_logo_icons[]" type="file" class="form-control pull-right" id="partner_logo_icons" onchange="checkPhoto(this,'blah15<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="partner_logo_pdfs">PDF:</label></div>
                                                                <div class="col-md-10">
                                                                    <input name="partner_logo_pdfs[]" type="file" class="form-control pull-right" id="partner_logo_pdfs">
                                                                    <?php if(!empty($rec['pdf'])) { ?> <a href="<?=base_url($rec['pdf']); ?>" target="blank">View PDF</a> <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="partner_logo_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'partner_logo_title', 'name' => 'partner_logo_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="partner_logo_logo">Logo:</label></div>
                                                                <div class="col-md-10"><input name="partner_logo_logos[]" type="file" class="form-control pull-right" id="partner_logo_logos" onchange="checkPhoto(this,'blah16<?=$k; ?>')"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_logo" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_steps" class="remove_button" title="Remove field">
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
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah15_container">
                                                                <img class="img2" id="blah15" src="<?=base_url(!empty($steps_icon)?$steps_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="partner_logo_iconimage" name="partner_logo_iconimage[]">
                                                                <input type="hidden" id="partner_logo_pdf" name="partner_logo_pdf[]">
                                                            </div>
                                                            <div id="blah16_container">
                                                                <img class="img1" id="blah16" src="<?=base_url(!empty($steps_logo)?$steps_logo:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="partner_logo_logoimage" name="partner_logo_logoimage[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="partner_logo_icons">PDF Screenshot:</label></div>
                                                                <div class="col-md-10"><input name="partner_logo_icons[]" type="file" class="form-control pull-right" id="partner_logo_icons" onchange="checkPhoto(this,'blah15')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="partner_logo_pdfs">PDF:</label></div>
                                                                <div class="col-md-10">
                                                                    <input name="partner_logo_pdfs[]" type="file" class="form-control pull-right" id="partner_logo_pdfs">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="partner_logo_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'partner_logo_title', 'name' => 'partner_logo_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="partner_logo_logo">Logo:</label></div>
                                                                <div class="col-md-10"><input name="partner_logo_logos[]" type="file" class="form-control pull-right" id="partner_logo_logos" onchange="checkPhoto(this,'blah16<?=$k; ?>')"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_logo" class="add_button" title="Add field">
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
        
        var add_steps = $('#add_steps'); //Add button selector
        var steps_wrapper = $('#steps_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_steps).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var blah6 = 'blah6a'+y;
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div><div id="'+blah6+'_container"> <img class="img1" id="'+blah6+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div><div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="key_elements_pdfs">PDF:</label></div><div class="col-md-10"><input name="key_elements_pdfs[]" type="file" class="form-control pull-right" id="key_elements_pdfs"></div></div><div class="row"> <div class="col-md-2"><label for="key_elements_title">Title:</label></div><div class="col-md-10"><input type="text" name="key_elements_title[]" value="" id="key_elements_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"><div class="col-md-2"><label for="key_elements_icons">Logo:</label></div><div class="col-md-10"><input name="key_elements_logos[]" type="file" class="form-control pull-right" id="key_elements_logos" onchange="checkPhoto(this,\''+blah6+'\')"></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(steps_wrapper).append(fieldHTMLSteps); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(steps_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

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
                var blah6 = 'blah6a'+y;
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row logosBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div><div id="'+blah6+'_container"> <img class="img2" id="'+blah6+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="partner_logo_icons">Icon:</label></div><div class="col-md-10"><input name="partner_logo_icons[]" type="file" class="form-control pull-right" id="partner_logo_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="partner_logo_pdfs">PDF:</label></div><div class="col-md-10"><input name="partner_logo_pdfs[]" type="file" class="form-control pull-right" id="partner_logo_pdfs"></div></div><div class="row"> <div class="col-md-2"><label for="partner_logo_title">Title:</label></div><div class="col-md-10"><input type="text" name="partner_logo_title[]" value="" id="partner_logo_title" class="form-control input-md" placeholder="Title..."></div></div></div><div class="row"> <div class="col-md-2"><label for="partner_logo_logos">Icon:</label></div><div class="col-md-10"><input name="partner_logo_logos[]" type="file" class="form-control pull-right" id="partner_logo_logos" onchange="checkPhoto(this,\''+blah6+'\')"></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

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