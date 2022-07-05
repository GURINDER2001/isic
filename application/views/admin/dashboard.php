<div class="content-wrapper">
    <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner"><h3><?=$total_brands;?></h3><p>Cards</p></div>
                    <div class="icon"><i class="fa fa-globe"></i></div>
                    <a href="<?=base_url('admin/cards'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner"><h3><?=$total_users;?></h3><p>Users</p></div>
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <a href="<?=base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner"><h3><?=$total_programs;?></h3><p>Programs</p></div>
                    <div class="icon"><i class="fa fa-file-text-o"></i></div>
                    <a href="<?=base_url('admin/programs'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner"><h3><?=$total_news;?></h3><p>Blogs</p></div>
                    <div class="icon"><i class="fa fa-pencil"></i></div>
                    <a href="<?=base_url('admin/articles'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Enquiries</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-info"><?=!empty($total_enquiries)?$total_enquiries.' Enquiries':'0 Enquiry'; ?></span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>User</th> 
                                        <th>Subject</th>                                       
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <?php
                                if(!empty($enquiries_data))
                                {
                                    ?>
                                    <tbody>
                                    <?php
                                    foreach ($enquiries_data as $key => $enq)
                                    {
                                       ?>
                                        <tr>
                                            <td><?=!empty($enq->first_name)?$enq->first_name.' '.$enq->last_name:''; ?></td>
                                            <td><?=!empty($enq->college_id)?getCollegeName($enq->college_id):''; ?></td>
                                            <td><?=!empty($enq->program_id)?getProgramNameById($enq->program_id):''; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?=base_url('admin/enquiries'); ?>" class="uppercase">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recent Registrations</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-info"><?=$total_users;?> Users</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>User Name</th> 
                                        <th>Email</th>                                       
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <?php
                                if(!empty($users_data))
                                {
                                    ?>
                                    <tbody>
                                    <?php
                                    foreach ($users_data as $usersData)
                                    {
                                       ?>
                                        <tr>
                                            <td><?=$usersData->first_name.' '.$usersData->last_name; ?></td>
                                            <td><?=$usersData->email; ?></td>
                                            <td><?=$usersData->created_date; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?=base_url('admin/users')?>" class="uppercase">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>