<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Shachah Web Admin Panel| <?=$title?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Shachah Admin Panel" name="description" />
    <meta content="Sewalu Mukasa Steven" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?=base_url('assets/pages/css/profile.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/fancybox/source/jquery.fancybox.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/select2/css/select2.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-summernote/summernote.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/datatables/datatables.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
    
    
    <link href="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/clockface/css/clockface.css')?>" rel="stylesheet" type="text/css" />

    <link href="<?=base_url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')?>" rel="stylesheet" type="text/css" />

    <link href="<?=base_url('assets/global/plugins/cubeportfolio/css/cubeportfolio.css')?>" rel="stylesheet" type="text/css" />


    <link href="<?=base_url('assets/global/plugins/morris/morris.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/fullcalendar/fullcalendar.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?=base_url('assets/global/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?=base_url('assets/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?=base_url('assets/layouts/layout/css/layout.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/layouts/layout/css/themes/blue.min.css')?>" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?=base_url('assets/layouts/layout/css/custom.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?=base_url('clogo.png')?>" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?=site_url('/')?>">
                    <img src="<?=base_url('wlogocut.png')?>" width="93" height="40" alt="logo" class="logo-default" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?=base_url('uploads/'.$user['tmp_name'])?>" />
                            <span class="username username-hide-on-mobile"> <?=$user['fullname'];?> </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">

                            <li>
                                <a href="<?=site_url('account')?>">
                                    <i class="icon-user"></i>Account Settings</a>
                            </li>
                            <li>
                                <a href="<?=site_url('logout')?>">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="<?=site_url('logout')?>" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <!-- END SIDEBAR TOGGLER BUTTON -->

                    <li class="nav-item start <?=($page=='home')?'active open':'';?>">
                        <a href="<?=site_url('/')?>" class="nav-link">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=($page=='content')?'active open':'';?>">
                        <a href="<?=site_url('content')?>" class="nav-link">
                            <i class="icon-docs"></i>
                            <span class="title">Content Manager</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    
                    <li class="nav-item <?=($page=='services')?'active open':'';?>">
                        <a href="<?=site_url('services')?>" class="nav-link">
                            <i class="icon-briefcase"></i>
                            <span class="title">Co Curriculum</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=($page=='events')?'active open':'';?>">
                        <a href="<?=site_url('events')?>" class="nav-link">
                            <i class="fa fa-calendar"></i>
                            <span class="title">Events & Announcements</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=($page=='slides')?'active open':'';?>">
                        <a href="<?=site_url('slides')?>" class="nav-link">
                            <i class="icon-picture"></i>
                            <span class="title">Home Slides</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=($page=='gallery')?'active open':'';?>">
                        <a href="<?=site_url('gallery')?>" class="nav-link">
                            <i class="fa fa-picture-o"></i>
                            <span class="title">Gallery</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=($page=='contacts')?'active open':'';?>">
                        <a href="<?=site_url('contacts')?>" class="nav-link">
                            <i class="icon-call-end"></i>
                            <span class="title">Contact Manager</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=($page=='students')?'active open':'';?>">
                        <a href="<?=site_url('students')?>" class="nav-link">
                            <i class="fa fa-group"></i>
                            <span class="title">Students</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    
                    <li class="nav-item <?=($page=='settings')?'active open':'';?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">Settings</span>
                            <span class="selected"></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="<?=site_url('users')?>" class="nav-link ">
                                    <span class="title">Users</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?=site_url('ctypes')?>" class="nav-link ">
                                    <span class="title">Content Categories</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?=site_url('ctypes/gcategories')?>" class="nav-link ">
                                    <span class="title">Gallery Categories</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?=site_url('ctypes/grades')?>" class="nav-link ">
                                    <span class="title">Grades</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->