<?php include(dirname(__FILE__).'/../includes/header.php'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?=site_url('/')?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Settings</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Users</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Users
            <small>Listing of administrators & adding new ones</small>
        </h1>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-users"></i>Users </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="#newuser" data-toggle="modal" class="btn sbold green"> Add New User
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if(isset($message)){ ?>
                                        <div class="alert alert-warning">
                                            <?=$message?>
                                        </div>
                                    <?php } ?>
                                    <div class="modal fade bs-modal-lg" id="newuser" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add New User</h4>
                                                </div>
                                                <form action="" enctype="multipart/form-data" method="post" id="form">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Fullname</label>
                                                                    <input type="text" name="fullname" value="" class="form-control" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="email" name="email" value="" class="form-control" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Phone</label>
                                                                    <input type="text" name="phone" value="" class="form-control phone" required />
                                                                    <span class="help-block"> (+256) 000-000-000 </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                        <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="img">
                                                                            </span>
                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                    <span class="help-block"> Should be atleast 300 X 300 Pixels </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Username</label>
                                                                    <input type="text" name="username" value="" class="form-control" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Password</label>
                                                                    <input type="password" name="password" id="password" value="" class="form-control" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Confirm Password</label>
                                                                    <input type="password" name="confirm_password" id="confirm_password" value="" class="form-control" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="action" value="add">
                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="adduser" class="btn green">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>Thumb</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $key =>$user){ ?>
                                <tr class="odd gradeX">
                                    <td><img src="<?=base_url('uploads/'.$user['tmp_name'])?>" alt="" width="40" height="40" /></td>
                                    <td><?=$user['fullname'] ?></td>
                                    <td><?=$user['email'] ?></td>
                                    <td><?=$user['phone'] ?></td>
                                    <td>
                                        <?=($user['status'] == 1)?"<span class='label label-success'>Online</span>":"<span class='label label-danger'>Offline</span>" ?>
                                    </td>
                                    <td><?=date("d M, Y", strtotime($user['created'])) ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#myModal-<?=$user['admin_id'];?>">
                                                        <i class="icon-pencil"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal-<?=$user['admin_id'];?>">
                                                        <i class="icon-trash"></i> Delete </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php foreach ($users as $key => $userm) { ?>
                            <div class="modal fade" id="myModal-<?=$userm['admin_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Edit <?=$userm['fullname'];?> details</h4>
                                        </div>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" name="email" value="<?=$userm['email']?>" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" name="phone" value="<?=$userm['phone']?>" class="form-control" required />
                                                </div>
                                                <input type="hidden" name="action" value="edit" />
                                                <input type="hidden" name="admin_id" value="<?=$userm['admin_id']?>" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="submit" value="save changes" class="btn green">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div class="modal fade" id="deleteModal-<?=$userm['admin_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Message</h4>
                                        </div>
                                        <form method="post" action="">
                                            <div class="modal-body">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> All changes related to this user will be removed, do you want to proceed?
                                                </div>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="admin_id" value="<?=$userm['admin_id'];?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn green">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        <?php } ?>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>

        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include(dirname(__FILE__).'/../includes/footer.php'); ?>
