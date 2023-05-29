<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=SITENAME;?></title>
    <!--STYLESHEET-->
    <!--Open Sans Font [ OPTIONAL ]-->
    <link rel="icon" href="<?=URLROOT;?>/common/assets/img/site_icon.png">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?=URLROOT;?>/common/assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?=URLROOT;?>/common/assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.js"></script>

    <!--[ OPTIONAL ]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!--CSS Loaders [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/plugins/css-loaders/css/css-loaders.css" rel="stylesheet">

        <style>
            .wrapper1, .wrapper2 {
            width: 300px;
            overflow-x: scroll;
            overflow-y:hidden;
            }

            .wrapper1 {height: 20px; }
            .wrapper2 {height: 200px; }

            .div1 {
            width:1000px;
            height: 20px;
            }

            .div2 {
            width:1000px;
            height: 200px;
            background-color: #88FF88;
            overflow: auto;
            }
        </style>
</head>
<body>
    
    <div id="loadingDiv" style="display: none; background: url(<?=URLROOT;?>/common/assets/img/loaders/transparent-background-loading.gif) no-repeat center center; position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 9999999;"></div>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header"><!--Brand logo & name-->
                    <a href="<?=URLROOT;?>/Dashboard" class="navbar-brand">
                        <img src="<?=URLROOT;?>/common/assets/img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">A-E</span>
                        </div>
                    </a>
                </div><!--End brand logo & name-->

                <!--Navbar Dropdown-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">
                        <li class="tgl-menu-btn"><!--Navigation toogle button-->
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li> <!--End Navigation toogle button-->
                        <li><!--Search-->
                            <div class="custom-search-form">
                                <!--<form method="post">
                                    <select id="ulb_id" class="form-control">
                                        <option value="">SELECT ULB</option>
                                        <option value="RANCHI">RANCHI</option>
                                        <option value="DHANDAB">DHANDAB</option>
                                    </select>
                                </form>-->

                            </div>
                        </li><!--End Search-->
                    </ul>
                    <ul class="nav navbar-top-links">
                        <!--Notification dropdown-->
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="demo-pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list noti_list">

                                        </ul>
                                    </div>
                                </div>

                                <div class="pad-all bord-top">
                                    <a href="<?=URLROOT;?>/NotificationController/AllNotificationList" class="btn-link text-main box-block">
                                        <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--End notifications dropdown-->

                        <!--User dropdown-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <i class="demo-pli-male"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                    <a href="<?php echo URLROOT.'/Masters/user_add_update/'.$_SESSION['emp_details']['user_mstr_id']  ?>" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> change password
                            </a>
                                    </li>
                                    <li>
                                        <a href="<?=URLROOT;?>/Login/Logout"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--End user dropdown-->
                        <li>
                            <a href="#" class="aside-toggle">
                                <i class="demo-pli-dot-vertical"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--End Navbar Dropdown-->
            </div>
        </header>
        <!--END NAVBAR-->
        <div class="boxed">
