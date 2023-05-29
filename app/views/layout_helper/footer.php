<!--ASIDE-->
            <aside id="aside-container">
                <div id="aside">
                    <div class="nano">
                        <div class="nano-content">
                            <!--Nav tabs-->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#demo-asd-tab-1" data-toggle="tab">
                                        <i class="demo-pli-speech-bubble-7 icon-lg"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#demo-asd-tab-2" data-toggle="tab">
                                        <i class="demo-pli-information icon-lg icon-fw"></i> Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#demo-asd-tab-3" data-toggle="tab">
                                        <i class="demo-pli-wrench icon-lg icon-fw"></i> Settings
                                    </a>
                                </li>
                            </ul>
                            <!--End nav tabs-->
                            <!-- Tabs Content -->
                            <div class="tab-content">

                                <!--First tab (Contact list)-->
                                <div class="tab-pane fade in active" id="demo-asd-tab-1">
                                    Tab 1
                                </div>
                                <!--End first tab (Contact list)-->
                                <!--Second tab (Custom layout)-->
                                <div class="tab-pane fade" id="demo-asd-tab-2">
                                    Tab 2
                                </div>
                                <!--End second tab (Custom layout)-->
                                <!--Third tab (Settings)-->
                                <div class="tab-pane fade" id="demo-asd-tab-3">
                                    Tab 3
                                </div>
                                <!--Third tab (Settings)-->

                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--END ASIDE-->

            <!--MAIN NAVIGATION-->
            <nav id="mainnav-container">
                <div id="mainnav">
                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="<?=URLROOT;?>/common/assets/img/avatar/default_avatar.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?=(isset($_SESSION['emp_details']))?$_SESSION['emp_details']['first_name']." ".$_SESSION['emp_details']['last_name']:"";?></p>
                                            <span class="mnp-desc"><?=(isset($_SESSION['emp_details']))?$_SESSION['emp_details']['email_id']:"";?></span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="<?=URLROOT;?>/Login/Logout" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>

                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--End shortcut buttons-->
                                <ul id="mainnav-menu" class="list-group">
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i>
                                            <span class="menu-title">Dashboard</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?=URLROOT;?>/Dashboard">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cogs"></i>
                                            <span class="menu-title">Masters</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?=URLROOT;?>/Masters/DeptList">Department List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/DesignationList">Designation List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/DocList">Document List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/CourseList">Course List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/GradeList">Grade List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/EmployeementList">Employeement Type List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/RelationList">Relation List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/WardList">Ward List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/ProjectList">Project List</a></li>
                                            <li><a href="<?=URLROOT;?>/Masters/LeaveList">Leave Type List</a></li>


                                        </ul>
                                    </li>
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cogs"></i>
                                            <span class="menu-title">Recruitment</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?=URLROOT;?>/form_Controller/job_post_list">Job Post List</a></li>
                                            <li><a href="<?=URLROOT;?>/form_Controller/candidate_list">Candidate List</a></li>
                                            <li><a href="<?=URLROOT;?>/InterviewController/schedule_interview">Interview List</a></li>
                                        </ul>
                                    </li>
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user-o
"></i>
                                            <span class="menu-title">User</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?=URLROOT;?>/EmployeeController/empList">Employee List</a></li>
                                            <li><a href="<?=URLROOT;?>/EmployeeController/empAddUpdate">Employee Add</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End menu-->
                </div>
            </nav>
            <!--END MAIN NAVIGATION-->

        <!-- FOOTER -->
        <footer id="footer">
            <!-- Visible when footer positions are fixed -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>
            <!-- Visible when footer positions are static -->
            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>
            <p class="pad-lft">&#0169; 2017 Your Company</p>
        </footer>
        <!-- END FOOTER -->
        <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>

    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--jQuery [ REQUIRED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/jquery.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/bootstrap.min.js"></script>
    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/nifty.min.js"></script>
    <!--[ OPTIONAL ]-->
    <script src="<?=URLROOT;?>/common/assets/plugins/masked-input/jquery.maskedinput.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/otherJs/validation.js"></script>

<script type="text/javascript">
    $('.mask_date').mask('9999-99-99',{placeholder:"yyyy-mm-dd"});
    $('.mask_mobile_no').mask('(999) 999-9999');
</script>
