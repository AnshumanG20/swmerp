</div>
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
                                <span class="mnp-desc"><?php
                                if(isset($_SESSION['emp_details'])){
                                    if($_SESSION['emp_details']['designation_mstr_id']==9){
                                        echo "Hr Manager";
                                    }
                                    if($_SESSION['emp_details']['designation_mstr_id']==1){
                                        echo "Admin";
                                    }
                                    if($_SESSION['emp_details']['designation_mstr_id']==0){
                                        echo "Super Admin";
                                    }
                                    
                                }
                                ?></span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="<?php echo URLROOT.'/Masters/user_add_update/'.$_SESSION['emp_details']['user_mstr_id']  ?>" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> change password
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
                    <!-- <ul id="mainnav-menu" class="list-group">
                        <li>
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span class="menu-title">Dashboard</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/Dashboard">Dashboard</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Masters</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/Masters/DeptList">Department List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/DesignationList">Designation List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/DocList">Document List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/QualificationList">Qualification List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/sub_QualificationList">Stream List</a></li>
                                <li><a href="<?=URLROOT;?>/Sub_Stream/sub_QualificationList">Sub Stream List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/EmployeementList">Employment Type List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/ProjectList">Project List</a></li>
                                <li><a href="<?=URLROOT;?>/Task/taskList">Task List</a></li>
                                <li><a href="<?=URLROOT;?>/Masters/LeaveList">Leave Type List</a></li>
                                <li><a href="<?=URLROOT;?>/Earning_Deduction/Earning_Deduction_List">Earning & Deduction List</a></li>
                                <li><a href="<?=URLROOT;?>/Company_Details/company_details_list">Company Details</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Task Management</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/Task_Assign/task_assign_list">Task Assign List</a></li>
                                 <li><a href="<?=URLROOT;?>/Task_Assign/re_assign_task_list">Incomplete/Reject Task List</a></li>
                                 <li><a href="<?=URLROOT;?>/Task_Assign/approve_task_list">Approve Task</a></li>
                                <li><a href="<?=URLROOT;?>/Task_Assign/recieve_task_list">Receive Task List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Recruitment</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/form_Controller/job_post_list">Job Post List</a></li>
                                <li><a href="<?=URLROOT;?>/InterviewController/interview_list">Interview List</a></li>
                                <li><a href="<?=URLROOT;?>/InterviewProcessController/interview_process_list">Interview Process List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Self Service</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <?php
                                if($_SESSION['emp_details']['user_mstr_id']!='1')
                                {
                                ?>
                                <li><a href="<?=URLROOT;?>/LeaveController/leaverequest_add_update">Leave Request</a></li>
                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Salary Management</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/SalaryController/emp_sal_gen_list">Salary Generate</a></li>
                                <li><a href="<?=URLROOT;?>/SalaryController/employee_salary_payment_list">Salary Payment</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Reports</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/LeaveController/AllLeaveList">Leave List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Asset Mgmt</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/Asset/AssetList">Asset List</a></li>
                                <li><a href="<?=URLROOT;?>/Asset/AssetAssignedList">Assign Asset</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-user-o
                                          "></i>
                                <span class="menu-title">User</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/Employee/empList">Employee List</a></li>
                                <li><a href="<?=URLROOT;?>/Employee/empAddUpdate">Employee Add</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span class="menu-title">Termination</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="<?=URLROOT;?>/Termination/add_update_termination">Employee Termination</a></li>
                            </ul>
                        </li>
                    </ul> -->
                    <?php
                    if(isset($_SESSION['emp_details'])){     
                        if(isset($_SESSION['emp_details']['menuList'])){
                            
                    ?>
                    <ul id="mainnav-menu" class="list-group">
                    <!-- only super admin will see dashboard -->
                    <?php if(isset($_SESSION['emp_details']['designation_mstr_id'])){ if($_SESSION['emp_details']['designation_mstr_id']==0){ ?>
                        <li>
                            <a href="<?=URLROOT;?>/Dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li> 
                    <?php } } ?>
                        
                    <?php
                            foreach ($_SESSION['emp_details']['menuList'] as $key => $value) {
                    ?>
                        <!--Menu list item-->
                        <li id="<?=$value['_id'];?>">
                            <a href="#">
                                <i class="fa fa-snowflake-o"></i>
                                <span class="menu-title"><?=$value['menu_name'];?></span>
                                <i class="arrow"></i>
                            </a>
                    <?php
                                if(isset($value['sub_menu'])){
                                    echo '<ul class="collapse">';
                                    foreach ($value['sub_menu'] as $key => $subMenu) {
                    ?>
                                        <li id="ul_<?=$subMenu["_id"];?>">
                                            <a href="<?=URLROOT;?>/<?=$subMenu['menu_path'];?>" onclick="navBarMenuActive('<?=$value['_id'];?>', '<?=$subMenu['_id'];?>');"><?=$subMenu['menu_name'];?></a>  
                                        </li>
                <?php
                                    }
                                    echo '</ul>';
                                }
                    ?>
                        </li>
                    <?php
                            }
                    ?>
                    </ul>
                    <?php
                        }
                    }
                    ?>
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
        <!--14GB of <strong>512GB</strong> Free.//-->
    </div>
    <p class="pad-lft"><!--&#0169; 2017 Your Company//--></p>
</footer>
<!-- END FOOTER -->
<!-- SCROLL PAGE BUTTON -->
<button class="scroll-top btn">
    <i class="pci-chevron chevron-up"></i>
</button>
<div class="modal fade" id="imagePopUp-lg-modal" role="dialog" tabindex="-1" aria-hidden="true"><!--Large Bootstrap Modal-->
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
            </div>
            <!--Modal body-->
            <div class="modal-body" style="padding: 5px;">
                <img src="" class="img-lg imagePopUpPreview" alt="Profile Picture" style="width: 100%; height: 100%;">                    
            </div>
        </div>
    </div>
</div><!--End Large Bootstrap Modal-->
</div>
<!-- END OF CONTAINER -->
</body>
</html>
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
<script>

    $(document).ready(function(){
        $(function(){
            $('.imagePopUp').on('click', function() {
                $('.imagePopUpPreview').attr('src', $(this).find('img').attr('src'));
                $('#imagePopUp-lg-modal').modal('show');   
            });     
        });
        
        var logged_emp_id = <?php echo $_SESSION['emp_details']['_id']; ?>;
        //alert(logged_emp_desg_id);
        function load_unseen_notification(view = '')
        {
            $.ajax({
                url: "<?=URLROOT;?>/NotificationController/three_active_notification",
                method:"POST",
                data:{view:view, logged_emp_id:logged_emp_id},
                dataType:"json",
                success:function(data)
                {
                    if(data.response==true){
                        $('.noti_list').html(data.data.notification);
                        if(data.data.unseen_notification.notification_count > 0)
                        {
                            $('.badge-header').html(data.data.unseen_notification.notification_count);
                        }
                    }
                    //console.log(data);
                    //alert(data.data.unseen_notification.notification_count);


                }
            });
        }

        load_unseen_notification();

        $(document).on('click', '.dropdown-toggle', function(){
            $('.badge-header').html('');
            load_unseen_notification('yes');
        });

        setInterval(function(){
            load_unseen_notification();
        }, 5000);        
    });
    function navBarMenuActive(menuName, subMenuName){
        if (typeof(Storage) !== "undefined") {
            sessionStorage.setItem("activeMenuName", menuName);
            sessionStorage.setItem("activeSubMenuName", subMenuName);
        }
    }
    if(typeof(Storage) !== "undefined") {
            var activeMenuName = sessionStorage.getItem('activeMenuName');
            var activeSubMenuName = sessionStorage.getItem('activeSubMenuName');
            $("#"+activeMenuName).addClass("active-sub active");
            $("#ul_"+activeSubMenuName).addClass("active-link");
    }
        
</script>


  