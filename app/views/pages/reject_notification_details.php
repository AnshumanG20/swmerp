
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
                                    <?php if(isset($data["reject_notification"])):?>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="dept"> Reason</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="reject_Reason" name="reject_Reason" readonly style=" border: none;"><?=$data["reject_notification"]["reject_resign_reason"];?> </textarea>
                                            </div>
                                        </div>
                                        <div class="content" id="watermark">
                                            <b class="text-danger">Resignation Request Rejected</b>
                                        </div>
                                        <hr>
                                    </div>
                                     <?php endif;?>
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
 