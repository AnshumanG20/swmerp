
<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Full & Final Settlment</a></li>
					<li class="active">Employee Resignation Notification Details</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>

                


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-sm-12">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Employee Resignation Notification Details</h3>
					            </div>
					            <!--Horizontal Form-->
					            <!--===================================================-->

                                <form class="form-horizontal" method="post" action="">

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Notice Period </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="resign_date" name="resign_date" class="form-control" value="<?=$data["accept_notification_details"]["notice_period"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Assets Submission Date </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="asset_date" name="asset_date" class="form-control" value="<?=$data["accept_notification_details"]["asset_submission_date"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="content" id="watermark">
                                            <b class="text-success">Resignation Request Accepted</b>
                                        </div>
                                        <hr>
                                    </div>

                                </form>

                                <!--===================================================-->
                                <!--End Horizontal Form-->

                            </div>
					    </div>
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script type="text/javascript">
    var $url = <?php explode("/sri/", $_SERVER['REQUEST_URI'])[1];?>
$.ajax({
    type:"POST",
    url: "<?=URLROOT;?>/Notification/NotiDeactivate",
    dataType: "json",
    
    data: {'employee_id':<?=$_SESSION['emp_details']['_id'];?>, 'link':'<?=$url;?>'},
    success:function(data){
        console.log(data);
    }
});
</script>

