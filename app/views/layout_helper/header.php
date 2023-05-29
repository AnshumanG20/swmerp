<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=SITENAME;?></title>
    <!--STYLESHEET-->
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?=URLROOT;?>/common/assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?=URLROOT;?>/common/assets/css/demo/nifty-demo.min.css" rel="stylesheet">

    <!--[ OPTIONAL ]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">    
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header"><!--Brand logo & name-->
                    <a href="<?=URLROOT;?>/common/assets/index.html" class="navbar-brand">
                        <img src="<?=URLROOT;?>/common/assets/img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">ZERO</span>
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
                                <form method="post">
                                    <select id="ulb_id" class="form-control">
                                        <option value="">SELECT ULB</option>
                                        <option value="RANCHI">RANCHI</option>
                                        <option value="DHANDAB">DHANDAB</option>
                                    </select>
                                </form>

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
                                        <ul class="head-list">
                                            <li>
                                                <a class="media" href="#">
                                                    <span class="label label-info pull-right">New</span>
                                                    <div class="media-left">
                                                        <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                                                        <small>Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="pad-all bord-top">
                                    <a href="#" class="btn-link text-main box-block">
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
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?=URLROOT;?>/HelperController"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
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
            