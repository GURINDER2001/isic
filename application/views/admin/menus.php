<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

    <div class="content-wrapper">
      <section class="content-header">

        <h1><?php echo $this->lang->line('menus');?></h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">Manage menu</a></li>

            <!-- <li class="active">Add Users</li> -->

        </ol>

    </section>
       

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">

                        <!-- /.box-userer -->
                        <div class="box-body">
                            <?php
                              echo form_open('#',array(),array(),'frmmenus');
                              echo form_close();
                            ?>

                                

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="menulocations">
                                          <?php //print_r($menu_locations);?>
                                            <select id="menu_locations" class="form-control">
                                              <?php foreach($menu_locations as $m){ ?>
                                                <option value="<?=$m['menulocationid']?>">
                                                    <?=$m['menulocationname']?>
                                                </option>
                                              <?php } ?>
                                                <!-- <option value="101">
                                                    <?php echo $this->lang->line('menusLocationTopLeft');?>
                                                </option>
                                                <option value="102">
                                                    <?php echo $this->lang->line('menusLocationTopRight');?>
                                                </option>
                                                <option value="103">
                                                    <?php echo $this->lang->line('menusLocationTopNavBar');?>
                                                </option>
                                                <option value="104">
                                                    <?php echo $this->lang->line('menusLocationBottomNavBar');?>
                                                </option>
                                                <option value="105">
                                                    <?php echo $this->lang->line('menusLocationBottomEnd');?>
                                                </option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                      <select id="menu_languages" class="form-control" style="display: none;">
                                          <option value="english">English</option>
                                          <!-- <option value="it">Italian</option> 
                                          <option value="nl">Dutch</option> -->
                                      </select>

                                      <button class="btn bg-blue" id="btn_showmenu">
                                          <?php echo $this->lang->line('menusShowMenus');?>
                                      </button>
                                      <span class="spinloadstrucute"></span>

                                    </div>

                                    <div class="col-md-3">                                     
                                        <!-- <input type="button" id="deleteallmenus" class="btn bg-red pull-right" value="<?php echo $this->lang->line('menusGenerateClearAllMenus');?>"/> -->
                                        <input type="button" id="deletecurrentmenus" class="btn bg-red pull-left" value="<?php echo $this->lang->line('menusGenerateClearCurrentMenus');?>" />
                                        <input type="button" id="savenavmenus" class="btn bg-orange pull-right" value="<?php echo $this->lang->line('menusGenerate');?>" />
                                    </div>
                                </div>

                                <hr>

                                <div class="row clearfix mt30">
                                    <div class="col-xs-4">
                                        <div id="menusources">

                                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab_1" data-toggle="tab"><?php echo $this->lang->line('menusSourceGeneral');?></a></li>
                                                    <!-- <li><a href="#tab_2" data-toggle="tab"><?php echo $this->lang->line('menusSourceContent');?></a></li> -->

                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Menu Title</label>
                                                            <input type="text" class="form-control" id="menuTitle" aria-describedby="emailHelp" placeholder="Menu title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Menu Link</label>
                                                            <input type="text" class="form-control" id="menuLink" placeholder="Menu Link">
                                                        </div>
                                                        <!-- <select id="menu_target" class="form-control ">
                                                              <option value="#"><?php echo $this->lang->line('menusSourceGeneralNone');?></option>
                                                              <option value="<?php echo base_url();?>"><?php echo $this->lang->line('menusSourceGeneralHome');?></option>
                                                              <option value="<?php echo base_url('about');?>about"><?php echo $this->lang->line('menusSourceGeneralAbout');?></option>
                                                              <option value="<?php echo base_url('contact');?>"><?php echo $this->lang->line('menusSourceGeneralContact');?></option>
                                                              <option value="<?php echo base_url('team');?>"><?php echo $this->lang->line('menusSourceGeneralExperts');?></option>
                                                              <option value="<?php echo base_url('gallery');?>"><?php echo $this->lang->line('menusSourceGeneralGallery');?></option>

                                                        </select> -->
                                                        <br/>
                                                        <input type="button" class="btn btn-theme addtonavmenu" value="<?php echo $this->lang->line('menusAddToStructure');?>" />
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <!--  <div class="tab-pane" id="tab_2">
                                                          <input type="text" class="form-control" id="quicksearchcontent"/>
                                                          <span class="spinquicksearchcontent"></span>

                                                          <div class="searchcontentresult navmenucontentzone"></div>

                                                      </div> -->

                                                    <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
                                            </div>
                                            <!-- nav-tabs-custom -->
                                        </div>
                                    </div>

                                    <div class="col-xs-8">
                                      <span id="generate" style="color:#FF0000; font-weight:bold;"></span>
                                      <div id="msg">Menu Items</div>
                                        <div id="menustructure">
                                            <div class="dd" id="nestable">
                                                <ol class="dd-list" id="webmenus">

                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
          </section>
    </div>
    <!-- /.row -->
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/nestle.css">
    <script src="<?php echo base_url();?>assets/admin/js/lobibox.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lobibox.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.nestable.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/navmenu_lang.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/navmenu.js"></script>

    <script>
        $(document).ready(function() {

            $('#generate').html('');
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    return (window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {

                    return false;
                }
            };

            $('#nestable').nestable({
                maxDepth: 4
            });

            $("#savenavmenus").click(function() {

                //send the requests now
                var structure = updateOutput($('#nestable').data('output', $('#generate')));
                //console.log(structure);

                //
                if (structure == false) {
                    showalert('error', languages_navmenu['oldbrowser']);
                    return false;
                }

                var loc = $('#menu_locations').val();
                var lang = $('#menu_languages').val();
                var postForm = $('#frmmenus').serialize() + '&loc=' + loc + '&lang=' + lang + '&s=' + structure;

                $('#generate').html(languages_navmenu['processing']);
                $.ajax({
                    type: "POST",
                    url: SiteRoot + "admin/navmenus/producemenus",

                    data: postForm,
                    dataType: "json",
                    cache: "false",
                    success: function(result) {

                        //remove it
                        if (result == '1') {
                            //success
                            nestlelistchanged = false;
                            $('#generate').html(languages_navmenu['saved']);
                        } else {
                            $('#generate').html(languages_navmenu['nosaved']);
                        }
                    },
                    fail: function(result) {
                        showalert('error', languages_navmenu['servererror']);
                    }

                });

            });
            $('#generate').html('');
        });
        $(window).on('load', function() {
            $('#btn_showmenu').click();
        });
    </script>
    <!-- /MAIN CONTENT -->
    <style type="text/css">
        .menublock {
            display: none;
        }
        
        span.nestleeditd.fa.fa-pencil {
            position: absolute;
            top: 0;
            right: -13px;
            z-index: 99999;
        }
        
        span.nestledeletedd.fa.fa-trash {
            position: absolute;
            top: 0;
            right: -25px;
            z-index: 99999;
        }
        
        .dd {
            float: left;
            width: 100%;
        }
    </style>