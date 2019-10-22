<?php include'includes/header.php'; ?>
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
        </h1>
        <!-- END PAGE TITLE-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-book"></i><?=$title?> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="#newcontent" data-toggle="modal" class="btn sbold green"> Add Event or Announcement
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
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
                                                            <label class="control-label">Title</label>
                                                            <input type="text" name="title" value="" class="form-control" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Category <span class="required"> * </span></label>
                                                            <select class="bs-select form-control" name="istype" required>
                                                                <option value="">-- Select --</option>
                                                                <option value="news">Announcement</option>
                                                                <option value="event">Event</option>
                                                                
                                                            </select>
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
                                                            <span class="help-block"> Should be atleast 657 X 300 Pixels </span>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label">Effective Date</label>
                                                            <input class="form-control form-control-inline input-medium date-picker" name="date" size="16" type="text" value="" required />
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
                                <th>Thumb</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th> Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($events as $key =>$blog){ ?>
                                <tr class="odd gradeX">
                                    <td><a href="<?=base_url('uploads/'.$blog['tmp_name'])?>" class="fancybox-button" data-rel="fancybox-button">
                                            <img src="<?=base_url('uploads/'.$blog['tmp_name'])?>" width="100" height="45" alt="<?=$blog['name']?>">
                                        </a></td>
                                    <td><?=ucfirst($blog['name']); ?></td>
                                    <td><?=strtoupper($blog['istype'])?></td>
                                    <td><?=date("d F, Y", strtotime($blog['when'])); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#myModal-<?=$blog['event_id'];?>">
                                                        <i class="icon-eye"></i> View </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#editModal-<?=$blog['event_id'];?>">
                                                        <i class="icon-pencil"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal-<?=$blog['event_id'];?>">
                                                        <i class="icon-trash"></i> Delete </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php foreach ($events as $key => $blogm) { ?>
                            <div class="modal fade bs-modal-lg" id="myModal-<?=$blogm['event_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title"><?=$blogm['name'];?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <a href="<?=base_url('uploads/'.$blogm['tmp_name'])?>" class="fancybox-button" data-rel="fancybox-button">
                                                <img src="<?=base_url('uploads/'.$blogm['tmp_name'])?>" width="100" height="100" alt="<?=$blogm['title']?>">
                                            </a>
                                            <?=$blogm['description'];?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                    <div class="modal fade bs-modal-lg" id="editModal-<?=$blogm['event_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit <?=$blogm['name'];?> details</h4>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Title</label>
                                        <input type="text" name="title" value="<?=$blogm['name']?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category <span class="required"> * </span></label>
                                        <select class="bs-select form-control" name="istype" required>
                                            <option value="news" <?=($blogm['istype'] == 'news')?'selected':''?>>Announcement</option>
                                            <option value="event" <?=($blogm['istype'] == 'event')?'selected':''?>>Event</option>
                                        </select>                                                            
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Effective Date</label>
                                        <input class="form-control form-control-inline input-medium date-picker" name="date" size="16" type="text" value="" required />
                                    </div>
                                                            
                                    <div class="form-group">
                                        <label class="control-label">Details</label>
                                        <textarea name="detail" class="wysihtml5 form-control" rows="5" required><?=$blogm['description']?></textarea>
                                    </div>
                                    <input type="hidden" name="action" value="edit" />
                                    <input type="hidden" name="event_id" value="<?=$blogm['event_id']?>" />
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
                            <div class="modal fade" id="deleteModal-<?=$blogm['event_id'];?>" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Message</h4>
                                        </div>
                                        <form method="post" action="">
                                            <div class="modal-body">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> All changes related to this event will be removed, do you want to proceed?
                                                </div>
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="event_id" value="<?=$blogm['event_id']?>">
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
<?php include 'includes/footer.php'; ?>
