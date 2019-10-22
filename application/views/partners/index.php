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
                    <span><?=$title?></span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"><?=$title?>
            <small>Add and Manage clients</small>
        </h1>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Extended Experience </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>Thumb</th>
                                <th>partner</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($partners as $key =>$partner){ ?>
                                <tr>
                                    <td><img src="<?=base_url('uploads/'.$partner['tmp_name'])?>" width="40" height="40"></td>
                                    <td><a href="<?=$partner['url']?>" target="_blank"><?=ucfirst($partner['partner']); ?></a></td>
                                    <td><?=date("d M, Y", strtotime($partner['created'])); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#editModal-<?=$partner['partner_id'];?>">
                                                        <i class="icon-pencil"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal-<?=$partner['partner_id'];?>">
                                                        <i class="icon-trash"></i> Delete </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php foreach ($partners as $key => $partnerm) { ?>
                            <div class="modal fade" id="editModal-<?=$partnerm['partner_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Edit <?=$partnerm['partner'];?> details</h4>
                                        </div>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">Client</label>
                                                    <input type="text" name="partner" value="<?=$partnerm['partner']?>" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">URL</label>
                                                    <input type="url" name="url" value="<?=$partnerm['url']?>" class="form-control" required />
                                                </div>

                                                <input type="hidden" name="action" value="edit" />
                                                <input type="hidden" name="partner_id" value="<?=$partnerm['partner_id']?>" />
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
                            <div class="modal fade" id="deleteModal-<?=$partnerm['partner_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Message</h4>
                                        </div>
                                        <form method="post" action="">
                                            <div class="modal-body">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> All changes related to this partner will be removed, do you want to proceed?
                                                </div>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="partner_id" value="<?=$partnerm['partner_id'];?>">
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
            <div class="col-md-6 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-globe font-green"></i>
                            <span class="caption-subject bold font-green uppercase">Add Extended Experience</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <?php
                        if($s == 'e')
                        {
                            echo '<div class="alert alert-danger">'.$message.'</div>';
                        }
                        elseif($s == 's')
                        {
                            echo '<div class="alert alert-success">'.$message.'</div>';
                        }

                        ?>
                        <form role="form" action="" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label class="control-label">Client</label>
                                <input type="text" name="partner" value="" class="form-control" required />
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
                                <span class="help-block"> Should be atleast 400 X 150 Pixels </span>
                            </div>

                            <div class="form-group">
                                <label class="control-label">URL</label>
                                <input type="text" name="url" value="" class="form-control" required />
                            </div>

                            <div class="margin-top-10">
                                <input type="hidden" name="action" value="add">
                                <button type="submit" name="submit" class="btn green">Save Changes </button>
                                <button type="reset" class="btn default">Cancel </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include(dirname(__FILE__).'/../includes/footer.php'); ?>
