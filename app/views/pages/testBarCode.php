<?php require APPROOT . '/views/layout_vertical/header.php'; ?>

<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Asset Management</a></li>
					<li class="active">Asset Details</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-md-12">
						<?php
						$data = [1548794514, 1331548, 126532532];
						foreach($data as $values){
							echo barCodeGen($values);

						echo "<br />";
						echo "<br />";
						echo "<br />";
						echo "<br />";
						echo "<br />";
						echo "<br />";
						echo "<br />";
						}
						//echo barCodeGenWithText(54646545);
						?>
						</div>
					</div>
				</div>
			</div>
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>