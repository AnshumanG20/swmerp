<?php require APPROOT . '/views/layout_vertical/header.php';?>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <div class="text-center cls-content">
            <h1 class="error-code text-info">403</h1>
        </div>
    </div>
    <!--Page content-->
    <div id="page-content">
        <!-- CONTENT -->
        <div class="text-center cls-content">
            <p class="h4 text-uppercase text-bold">Page Not Found!</p>
            <div class="pad-btm">
                Sorry, but the page you are looking for has not been found on our server.
            </div>

            
            <div class="row mar-ver">
                <form class="col-xs-12 col-sm-10 col-sm-offset-1" method="post" action="pages-search-results.html">
                    <input type="text" placeholder="Search.." class="form-control error-search">
                </form>
            </div>
            <hr class="new-section-sm bord-no">
            <div class="pad-top"><a class="btn btn-primary" href="<?=URLROOT;?>/DashboardCommon/Dash">Return Home</a></div>
        </div>
    </div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php';?>