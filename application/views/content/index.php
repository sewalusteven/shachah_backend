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
            <small>Managing web content</small>
        </h1>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-files-o"></i>Web Articles </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="#newcontent" data-toggle="modal" class="btn sbold green"> Add New Content
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
                                    <div class="modal fade bs-modal-lg" id="newcontent" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add Content</h4>
                                                </div>
                                                <form action="" enctype="multipart/form-data" method="post" id="form">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Category</label>
                                                            <select id="single" name="category_id" class="form-control select2">
                                                                <option value="">-- Select Category --</option>
                                                                <?php foreach ($categories as $key =>$category){?>
                                                                    <option value="<?=$category['ctype_id']?>"><?=$category['type']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Title</label>
                                                            <input type="text" name="title" value="" class="form-control" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Details</label>
                                                            <textarea name="detail"  id="summernote_1" rows="5" required></textarea>
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Published by</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($allcontent as $key =>$content){ ?>
                                <tr class="odd gradeX">
                                    <td><?=ucfirst($content['title']); ?></td>
                                    <td><?=ucfirst($content['ctype']['type']); ?></td>
                                    <td><?=ucfirst($content['admin']['fullname']); ?></td>
                                    <td><?=date("d F, Y", strtotime($content['created'])); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#myModal-<?=$content['content_id'];?>">
                                                        <i class="icon-eye"></i> View </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#editModal-<?=$content['content_id'];?>">
                                                        <i class="icon-pencil"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal-<?=$content['content_id'];?>">
                                                        <i class="icon-trash"></i> Delete </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php foreach ($allcontent as $key => $contentm) { ?>
                            <div class="modal fade" id="myModal-<?=$contentm['content_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title"><?=$contentm['title'];?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?=$contentm['details'];?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                    <div class="modal fade" id="editModal-<?=$contentm['content_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit <?=$contentm['title'];?> details</h4>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Title</label>
                                        <input type="text" name="title" value="<?=$contentm['title']?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Details</label>
                                        <textarea name="detail" class="wysihtml5 form-control" rows="5" required><?=$contentm['details']?></textarea>
                                    </div>
                                    <input type="hidden" name="action" value="edit" />
                                    <input type="hidden" name="content_id" value="<?=$contentm['content_id']?>" />
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
                            <div class="modal fade" id="deleteModal-<?=$contentm['content_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Message</h4>
                                        </div>
                                        <form method="post" action="">
                                            <div class="modal-body">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> All changes related to this content will be removed, do you want to proceed?
                                                </div>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="content_id" value="<?=$contentm['content_id']?>">
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
