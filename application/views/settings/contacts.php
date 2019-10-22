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
        <h1 class="page-title"> <?=$title?>
            <small>Manage Contacts here</small>
        </h1>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-phone"></i>Conexus Contacts </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th> Contact </th>
                                <th> Particulars </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($contacts as $key =>$single){ ?>
                                <tr class="odd gradeX">
                                    <td><?=ucfirst($single['category']) ?></td>
                                    <td><?=$single['contact'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#editModal-<?=$single['contact_id'];?>">
                                                        <i class="icon-pencil"></i> Edit Details </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal-<?=$single['contact_id'];?>">
                                                        <i class="icon-trash"></i> Delete </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php foreach ($contacts as $key => $singlem) { ?>
                            <div class="modal fade" id="editModal-<?=$singlem['contact_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Edit <?=$singlem['category'];?> details</h4>
                                        </div>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <input type="text" name="category" value="<?=$singlem['category']?>" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Contact</label>
                                                    <input type="text" name="contact" value="<?=$singlem['contact']?>" class="form-control" required />
                                                </div>
                                                <input type="hidden" name="contact_id" value="<?=$singlem['contact_id']?>" />
                                                <input type="hidden" name="action" value="edit" />
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
                            <div class="modal fade" id="deleteModal-<?=$singlem['contact_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Message</h4>
                                        </div>
                                        <form method="post" action="">
                                            <div class="modal-body">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> All changes related to this contact will be removed, do you want to proceed?
                                                </div>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="contact_id" value="<?=$singlem['contact_id']?>">
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
                            <i class="icon-call-end font-green"></i>
                            <span class="caption-subject bold font-green uppercase">Add Contact</span>
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
                            echo '<div role="alert" class="alert alert-success">'.$message.'</div>';
                        }

                        ?>
                        <form role="form" action="" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <input type="text" name="category" value="" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact</label>
                                <input type="text" name="contact" value="" class="form-control" />
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
