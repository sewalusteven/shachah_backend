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
                        <!-- END PAGE HEADER-->
                        <div class="portfolio-content portfolio-3">
                            <div class="clearfix">
                                <div id="js-filters-lightbox-gallery1" class="cbp-l-filters-dropdown cbp-l-filters-dropdown-floated">
                                    <div class="cbp-l-filters-dropdownWrap border-grey-salsa">
                                        <div class="cbp-l-filters-dropdownHeader uppercase">Sort Gallery</div>
                                        <div class="cbp-l-filters-dropdownList">
                                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item uppercase"> All (
                                                <div class="cbp-filter-counter"></div> Images) </div>
                                            
                                            <?php foreach ($categories as $key => $category) { ?>

                                                <div data-filter=".<?=slugify($category['category'])?>" class="cbp-filter-item uppercase"> <?=$category['category']?> (
                                                <div class="cbp-filter-counter"></div> Images) </div>
                                                
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group pull-right">
                                        <a href="#newcontent" data-toggle="modal" class="btn sbold green"> Add Image
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="modal fade bs-modal-lg" id="newcontent" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add Image</h4>
                                                </div>
                                                <form action="" enctype="multipart/form-data" method="post" id="form">
                                                    <div class="modal-body">                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Title</label>
                                                            <input type="text" name="name" value="" class="form-control" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Category <span class="required"> * </span></label>
                                                            <select class="bs-select form-control" name="category_id" required>
                                                                <option value="">-- Select --</option>
                                                                <?php foreach ($categories as $key => $category) { ?>
                                                                    <option value="<?=$category['gcategory_id']?>"><?=$category['category']?></option>
                                                                <?php } ?>
                                                                
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
                                                            <span class="help-block"> Should be atleast 1000 X 972 Pixels </span>
                                                        </div>                                     
                                                    </div>
                                                    <div class="modal-footer">
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
                            <div id="js-grid-lightbox-gallery" class="cbp">
                            <?php  foreach ($galleries as $key => $gallery) { ?>
                                <div class="cbp-item <?=slugify($gallery['category'])?>">
                                    <a class="cbp-caption cbp-singlePageInline" data-title="<?=$gallery['name']?>" rel="nofollow">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="<?=base_url('uploads/'.$gallery['tmp_name'])?>" width="600" height="600" alt=""> </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignLeft">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-title"><?=ucwords($gallery['name'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                            <?php } ?>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                
            </div>
            <!-- END CONTAINER -->
            <?php include 'includes/footer.php'; ?>