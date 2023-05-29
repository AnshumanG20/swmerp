<?php require APPROOT . '/views/layout_helper/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Modals</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">UI</a></li>
					<li class="active">Modals</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					
					<!--STATIC EXAMPLE-->
					<!--===================================================-->
					
					<div class="panel panel-trans">
					    <div class="panel-body demo-nifty-modal">
					
					        <!--Static Examplel-->
					        <div class="modal">
					            <div class="modal-dialog">
					                <div class="modal-content">
					                    <div class="modal-header">
					                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					                        <h4 class="modal-title">Modal title</h4>
					                    </div>
					
					                    <div class="modal-body">
					                        <p>One fine body ...........</p>
					                    </div>
					
					                    <div class="modal-footer">
					                        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
					                        <button class="btn btn-primary" type="button">Save changes</button>
					                    </div>
					                </div>
					            </div>
					        </div>
					
					    </div>
					</div>
					
					<!--===================================================-->
					<!--END OF STATIC EXAMPLE-->
					
					<div class="row">
					    <div class="col-md-6">
					        <div id="demo-panel-ref" class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Default modal</h3>
					            </div>
					            <div class="panel-body">
					
					                <!--Launch demo default modal-->
					                <p>Toggle a modal via JavaScript by clicking the button below. It will slide down and fade in from the top of the page.</p><br>
					                <button data-target="#demo-default-modal" data-toggle="modal" class="btn btn-primary btn-lg">Launch demo modal</button>
					
					            </div>
					        </div>
					    </div>
					    <div class="col-md-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Remove animation</h3>
					            </div>
					            <div class="panel-body">
					
					                <!--Launch demo modal wihtout animation-->
					                <p>For modals that simply appear rather than fade in to view, remove the <code>.fade</code> class from your modal markup.</p><br>
					                <button data-target="#demo-modal-wo-anim" data-toggle="modal" class="btn btn-primary btn-lg">Launch demo modal</button>
					
					            </div>
					        </div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-sm-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Optional sizes</h3>
					            </div>
					            <div class="panel-body">
					
					                <!--Large modal button-->
					                <p>Modals have two optional sizes, available via modifier classes to be placed on a <code>.modal-dialog</code></p><br>
					                <button data-target="#demo-lg-modal" data-toggle="modal" class="btn btn-warning">Large modal</button>
					
					            </div>
					        </div>
					    </div>
					    <div class="col-sm-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Optional sizes</h3>
					            </div>
					            <div class="panel-body">
					
					                <!--Small modal button-->
					                <p>Modals have two optional sizes, available via modifier classes to be placed on a <code>.modal-dialog</code></p><br>
					                <button data-target="#demo-sm-modal" data-toggle="modal" class="btn btn-success">Small modal</button>
					
					            </div>
					        </div>
					    </div>
					</div>
					<hr class="new-section-sm">
					<div class="row">
					    <div class="eq-height">
						    <div class="col-lg-4 eq-box-lg">
						        <div class="panel">
						            <div class="panel-heading">
						                <h3 class="panel-title">Bootbox Modals</h3>
						            </div>
						            <div class="panel-body demo-nifty-btn">
						
						                <!--Bootbox Modals-->
						                <button id="demo-bootbox-alert" class="btn btn-danger">Alert</button>
						                <button id="demo-bootbox-confirm" class="btn btn-info">Confirm</button>
						                <button id="demo-bootbox-prompt" class="btn btn-warning">Prompt</button>
						
						            </div>
						        </div>
						    </div>
					    
					    </div>
					</div>
					
					
                </div>
                <!--===================================================-->
                <!--End page content-->
        </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

<!-- BOOTSTRAP MODALS-->
    <!--====================================================-->



    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Modal Heading</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <p class="text-semibold text-main">Bootstrap Modal Vertical Alignment Center</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <br>
                    <p class="text-semibold text-main">Popover in a modal</p>
                    <p>This
                        <button class="btn btn-sm btn-warning demo-modal-popover add-popover" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="Popover Title">button</button>
                        should trigger a popover on click.
                    </p>
                    <br>
                    <p class="text-semibold text-main">Tooltips in a modal</p>
                    <p>
                        <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">This link</a> and
                        <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">that link</a> should have tooltips on hover.
                    </p>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->


    <!--Bootstrap Modal without Animation-->
    <!--===================================================-->
    <div class="modal" id="demo-modal-wo-anim" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Modal Heading</h4>
                </div>


                <!--Modal body-->
                <div class="modal-body">
                    <p class="text-semibold text-main">Bootstrap Modal Vertical Alignment Center</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <br>
                    <p class="text-semibold text-main">Popover in a modal</p>
                    <p>This
                        <button class="btn btn-sm btn-warning demo-modal-popover add-popover" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="Popover Title">button</button>
                        should trigger a popover on click.
                    </p>
                    <br>
                    <p class="text-semibold text-main">Tooltips in a modal</p>
                    <p>
                        <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">This link</a> and
                        <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">that link</a> should have tooltips on hover.
                    </p>
                </div>


                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Bootstrap Modal without Animation-->


    <!--Large Bootstrap Modal-->
    <!--===================================================-->
    <div id="demo-lg-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Large Bootstrap Modal-->


    <!--Small Bootstrap Modal-->
    <!--===================================================-->
    <div id="demo-sm-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Small Bootstrap Modal-->
<?php require APPROOT . '/views/layout_helper/footer.php'; ?>
<script type="text/javascript">
 $(document).ready(function() {
    $('#demo-bootbox-alert').on('click', function(){
            $.niftyNoty({
                type: 'danger',
                icon : 'pli-exclamation icon-2x',
                message : 'Hello world callback',
                container : 'floating',
                timer : 5000
            });
    });
    $('#demo-bootbox-confirm').on('click', function(){
            $.niftyNoty({
                type: 'info',
                icon : 'pli-exclamation icon-2x',
                message : 'Hello world callback',
                container : 'floating',
                timer : 5000
            });
    });
    $('#demo-bootbox-prompt').on('click', function(){
            $.niftyNoty({
                type: 'warning',
                icon : 'pli-exclamation icon-2x',
                message : 'Hello world callback',
                container : 'floating',
                timer : 5000
            });
    });
 });
</script>