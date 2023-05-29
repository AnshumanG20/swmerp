<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!-- CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">DASHBOARD</h1>
        </div><!--End page title-->
    </div>

    <!--Page content-->
    <div id="page-content">
    	<div class="panel">
		    <div class="panel-heading">
		        <h3 class="panel-title">DASHBOARD</h3>
		    </div>
		    <div class="panel-body">
				<div class="row">
					    <div class="col-sm-6 col-md-4">
					        <div class="row">
					            <div class="col-md-12">
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel media  bg-danger pad-all">
					                    <div class="media-left">
					                        <span class="icon-wrap icon-wrap-sm icon-circle">
					                        <i class="demo-pli-male icon-2x"></i>
					                        </span>
					                    </div>
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold"><?=(isset($data["empcount"]["count_employee"]))?$data["empcount"]["count_employee"]:'0';?></p>
					                        <p class="mar-no">Employees</p>
					                    </div>
					                </div>
					                <!--===================================================-->
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel media bg-purple pad-all">
					                    <div class="media-left ">
					                        <span class="icon-wrap icon-wrap-sm icon-circle">
					                        <i class="demo-pli-male icon-2x"></i>
					                        </span>
					                    </div>
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold"><?=(isset($data["custcount"]["count_customer"]))?$data["custcount"]["count_customer"]:'0';?></p>
					                        <p class="mar-no">Customers</p>
					                    </div>
					                </div>
					                <!--===================================================-->
					
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel media pad-all bg-info">
					                    <div class="media-left">
					                        <span class="icon-wrap icon-wrap-sm icon-circle">
					                        <i class="demo-pli-male icon-2x"></i>
					                        </span>
					                    </div>
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold"><?=(isset($data["vendorcount"]["count_vendor"]))?$data["vendorcount"]["count_vendor"]:'0';?></p>
					                        <p class="mar-no">Vendors</p>
					                    </div>
					                </div>
					                <!--===================================================-->
					
					            </div>
								
					        </div>
					    </div>
						<div class="col-sm-6 col-md-4">
					        <div class="row">
					            <div class="col-md-12">
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel media  bg-info pad-all">
					                    <div class="media-left">
					                        <span class="icon-wrap icon-wrap-sm icon-circle">
					                        <i class="demo-pli-speech-bubble-7 icon-2x"></i>
					                        </span>
					                    </div>
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold"><?=(isset($data["invcount"]["count_invoice"]))?$data["invcount"]["count_invoice"]:'0';?></p>
					                        <p class="mar-no">Invoice</p>
					                    </div>
					                </div>
					                <!--===================================================-->
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel media bg-success pad-all">
					                    <div class="media-left ">
											<span class="icon-wrap icon-wrap-sm icon-circle">
												<i class="demo-pli-speech-bubble-7 icon-2x"></i>
											</span>
					                    </div>
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold"><i class="fa fa-rupee"></i> <?=(isset($data["invpayreceive"]["payable_amt"]))?$data["invpayreceive"]["payable_amt"]:'0';?></p>
					                        <p class="mar-no">Payment Received</p>
					                    </div>
					                </div>
					                <!--===================================================-->
					
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel media pad-all bg-mint">
					                    <div class="media-left">
					                        <span class="icon-wrap icon-wrap-sm icon-circle">
					                        <i class="demo-pli-speech-bubble-7 icon-2x"></i>
					                        </span>
					                    </div>
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold"><i class="fa fa-rupee"></i> <?=(isset($data["invpaydue"]))?$data["invpaydue"]:'0';?></p>
					                        <p class="mar-no">Pending Amt</p>
					                    </div>
					                </div>
					                <!--===================================================-->
					
					            </div>
								
					        </div>
					    </div>
					    <div class="col-sm-6 col-md-4">
					        <div class="row">
					            <div class="col-sm-6 col-md-12">
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel panel-primary panel-colorful">
					                    <div class="pad-all text-center">
					                        <span class="text-3x text-thin"><i class="fa fa-rupee"></i> <?=(isset($data["incomeamt"]["payable_amt"]))?$data["incomeamt"]["payable_amt"]:'0';?></span>
					                        <p>Income</p>
					                        <i class="demo-pli-shopping-bag icon-2x"></i>
					                    </div>
					                </div>
					                <!--===================================================-->
					
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel panel-warning panel-colorful">
					                    <div class="pad-all text-center">
					                        <span class="text-3x text-thin"><i class="fa fa-rupee"></i> <?=(isset($data["expenseamt"]["payable_amt"]))?$data["expenseamt"]["payable_amt"]:'0';?></span>
					                        <p>Expense</p>
					                        <i class="demo-pli-shopping-bag icon-2x"></i>
					                    </div>
					                </div>
					                <!--===================================================-->
									
					            </div>
					        </div>
					    </div>
					</div>
					<!--<div class="row">
					        <div class="col-md-3">
					            <div class="panel panel-warning panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-file-word icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Documents</p>
					                </div>
					            </div>
					        </div>
					        <div class="col-md-3">
					            <div class="panel panel-info panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-file-zip icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Zip Files</p>
					                </div>
					            </div>
					        </div>
					        <div class="col-md-3">
					            <div class="panel panel-mint panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-camera-2 icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Photos</p>
					                </div>
					            </div>
					        </div>
					        <div class="col-md-3">
					            <div class="panel panel-danger panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-video icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Videos</p>
					                </div>
					            </div>
					        </div>
					
					    </div>-->
						<div class="row">
					        <div class="col-md-6">
					
					
					            <!-- Area Chart -->
					            <!---------------------------------->
					            <div class="panel">
					                <div class="panel-heading">
					                    <h3 class="panel-title">Overall Status</h3>
					                </div>
					                <div class="pad-all">
					                    <div id="overall_status" style="width: 100%; height: auto; white-space: nowrap; overflow-x: visible; overflow-y: hidden;"></div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-md-6">
					
					            <!-- Line Chart -->
					            <!---------------------------------->
					            <div class="panel">
					                <div class="panel-heading">
					                    <h3 class="panel-title">Income Vs Expense</h3>
					                </div>
					                <div class="pad-all">
					                    <div id="overall_stts" style="width: 100%; height: auto; white-space: nowrap; overflow-x: visible; overflow-y: hidden;"></div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					    </div>
		    </div><!--End panel-body-->
		</div><!--End panel-->
    </div><!--End page content-->
</div><!--END CONTENT CONTAINER-->
<script type="text/javascript">

if (typeof(Storage) !== "undefined") {
	sessionStorage.removeItem("activeMenuName");
	sessionStorage.removeItem("activeSubMenuName");
}
</script>
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
		debugger;
		// disable back button
		
		 /* Break back button */
		// window.onload = function preventbackbutton() { window.history.forward(); }
		// setTimeout("preventbackbutton()", 0);
		// window.onunload = function () { null };
		// disable back button ended




    function modelInfo(msg){
        $.niftyNoty({
            type: 'info',
            icon : 'pli-exclamation icon-2x',
            message : msg,
            container : 'floating',
            timer : 5000
        });
    }
    <?php 
	if($flashToast = flashToast('dashboard')){
	    echo "modelInfo('".$flashToast."');";
	}
	?>
});
</script>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
	  
	<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total Dues Donut Chart'],
          ['Active Employees',     <?=$data["empcount"]["count_employee"];?>],
          ['Active Invoice',     <?=$data["invcount"]["count_invoice"];?>],
          ['Active Vendors',     <?=$data["vendorcount"]["count_vendor"];?>],
          ['Active Customers',      <?=$data["custcount"]["count_customer"];?>]
        ]);

        var options = {
			title: 'Overall Status',
			pieHole: 0.4,
			width: '100%',
			height: 275,
        };

        var chart = new google.visualization.PieChart(document.getElementById('overall_status'));
        chart.draw(data, options);
      }
	</script>
	<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total Dues Donut Chart'],
          ['Total Income',     <?=$data["incomeamt"]["payable_amt"];?>],
          ['Total Expense',     <?=$data["expenseamt"]["payable_amt"];?>]
        ]);

        var options = {
			title: 'Income Vs Expense',
			pieHole: 0.4,
			width: '100%',
			height: 275,
        };

        var chart = new google.visualization.PieChart(document.getElementById('overall_stts'));
        chart.draw(data, options);
      }
	</script>