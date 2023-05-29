<?php require APPROOT . '/views/layout_vertical/header.php';?>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <div class="text-center cls-content">
        	<h1 class="error-code text-purple">404</h1>
        </div>
    </div>
    <!--Page content-->
    <div id="page-content">
        <!-- CONTENT -->
        <div class="text-center cls-content">
            <p class="h4 text-uppercase text-bold">Error!</p>
            <div class="pad-btm">
                Something went wrong and server couldn't process your request.
            </div>
            <div class="row mar-ver">
                <div class="col-md-12 text-danger">
                <?php
					if(isset($data)){
                    	foreach($data as $values){
							echo $values."<br />";
						}
                    }
				?>
                </div>
            </div>
            <hr class="new-section-sm bord-no">
        </div>
    </div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php';?>